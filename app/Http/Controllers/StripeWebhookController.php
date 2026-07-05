<?php

namespace App\Http\Controllers;

use App\Mail\GiftReceived;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function __invoke(Request $request)
    {
        $payload = $request->getContent();
        $signature = $request->header('Stripe-Signature');
        $webhookSecret = config('services.stripe.webhook_secret');

        try {
            $event = $webhookSecret
                ? Webhook::constructEvent($payload, $signature, $webhookSecret)
                : json_decode($payload, false, 512, JSON_THROW_ON_ERROR);
        } catch (\UnexpectedValueException|SignatureVerificationException|\JsonException $e) {
            logger()->warning('Invalid Stripe webhook payload: '.$e->getMessage());

            return response('Invalid webhook payload', 400);
        }

        $object = $event->data->object;

        match ($event->type) {
            'checkout.session.completed' => $this->updateGiftFromCheckoutSession($object, 'paid'),
            'checkout.session.expired' => $this->updateGiftFromCheckoutSession($object, 'expired'),
            'checkout.session.async_payment_failed' => $this->updateGiftFromCheckoutSession($object, 'failed', 'Async payment failed.'),
            'payment_intent.payment_failed' => $this->updateGiftFromPaymentIntent($object),
            default => null,
        };

        return response('Webhook received');
    }

    private function updateGiftFromCheckoutSession(object $session, string $status, ?string $failureMessage = null): void
    {
        $giftId = $session->metadata->gift_id ?? null;
        $gift = $giftId
            ? Gift::find($giftId)
            : Gift::where('stripe_checkout_session_id', $session->id)->first();

        if (! $gift) {
            logger()->warning('Stripe webhook could not find gift for Checkout Session '.$session->id);

            return;
        }

        $gift->update([
            'status' => $status,
            'payer_name' => $session->customer_details->name ?? $session->metadata->payer_name ?? $gift->payer_name,
            'payer_email' => $session->customer_details->email ?? $session->customer_email ?? $session->metadata->payer_email ?? $gift->payer_email,
            'stripe_checkout_session_id' => $session->id,
            'stripe_payment_intent_id' => is_string($session->payment_intent ?? null) ? $session->payment_intent : $gift->stripe_payment_intent_id,
            'stripe_failure_message' => $failureMessage,
        ]);

        if ($status === 'paid') {
            $this->sendGiftNotification($gift->refresh());
        }
    }

    private function updateGiftFromPaymentIntent(object $paymentIntent): void
    {
        $gift = Gift::where('stripe_payment_intent_id', $paymentIntent->id)->first();

        if (! $gift) {
            logger()->warning('Stripe webhook could not find gift for PaymentIntent '.$paymentIntent->id);

            return;
        }

        $gift->update([
            'status' => 'failed',
            'stripe_failure_message' => $paymentIntent->last_payment_error->message ?? 'Payment failed.',
        ]);
    }

    private function sendGiftNotification(Gift $gift): void
    {
        $recipient = config('gifts.notification_email');

        if (! $recipient || $gift->notification_sent_at) {
            return;
        }

        Mail::to($recipient)->send(new GiftReceived($gift));

        $gift->update(['notification_sent_at' => now()]);
    }
}
