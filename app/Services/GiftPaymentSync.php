<?php

namespace App\Services;

use App\Mail\GiftReceived;
use App\Models\Gift;
use Illuminate\Support\Facades\Mail;

class GiftPaymentSync
{
    public function syncFromCheckoutSession(object $session, string $status, ?string $failureMessage = null): ?Gift
    {
        $giftId = $session->metadata->gift_id ?? null;
        $gift = $giftId
            ? Gift::find($giftId)
            : Gift::where('stripe_checkout_session_id', $session->id)->first();

        if (! $gift) {
            logger()->warning('Could not find gift for Checkout Session '.$session->id);

            return null;
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

        return $gift;
    }

    public function syncFromPaymentIntent(object $paymentIntent): ?Gift
    {
        $gift = Gift::where('stripe_payment_intent_id', $paymentIntent->id)->first();

        if (! $gift) {
            logger()->warning('Could not find gift for PaymentIntent '.$paymentIntent->id);

            return null;
        }

        $gift->update([
            'status' => 'failed',
            'stripe_failure_message' => $paymentIntent->last_payment_error->message ?? 'Payment failed.',
        ]);

        return $gift;
    }

    private function sendGiftNotification(Gift $gift): void
    {
        $recipient = config('gifts.notification_email');

        if (! $recipient || $gift->notification_sent_at) {
            return;
        }

        try {
            Mail::to($recipient)->send(new GiftReceived($gift));
        } catch (\Throwable $e) {
            logger()->error('Gift notification email failed to send: '.$e->getMessage());

            return;
        }

        $gift->update(['notification_sent_at' => now()]);
    }
}
