<?php

namespace App\Http\Controllers;

use App\Services\GiftPaymentSync;
use Illuminate\Http\Request;
use Stripe\Exception\SignatureVerificationException;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function __construct(private readonly GiftPaymentSync $giftPaymentSync) {}

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
            'checkout.session.completed' => $this->giftPaymentSync->syncFromCheckoutSession($object, 'paid'),
            'checkout.session.expired' => $this->giftPaymentSync->syncFromCheckoutSession($object, 'expired'),
            'checkout.session.async_payment_failed' => $this->giftPaymentSync->syncFromCheckoutSession($object, 'failed', 'Async payment failed.'),
            'payment_intent.payment_failed' => $this->giftPaymentSync->syncFromPaymentIntent($object),
            default => null,
        };

        return response('Webhook received');
    }
}
