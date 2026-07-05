<?php

namespace App\Http\Controllers;

use App\Models\Gift;
use Illuminate\Http\Request;
use Stripe\Exception\ApiErrorException;
use Stripe\StripeClient;

class CheckoutController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'amount' => ['required', 'integer', 'min:1', 'max:10000'],
            'payer_name' => ['required', 'string', 'max:120'],
            'payer_email' => ['required', 'email', 'max:190'],
            'message' => ['nullable', 'string', 'max:500'],
        ]);

        $secret = config('services.stripe.secret');

        if (! $secret) {
            return back()
                ->withInput()
                ->withErrors(['amount' => 'Stripe is not configured yet. Add STRIPE_SECRET to your .env file.']);
        }

        $stripe = new StripeClient($secret);
        $gift = Gift::create([
            'amount' => $validated['amount'],
            'currency' => 'gbp',
            'payer_name' => $validated['payer_name'],
            'payer_email' => $validated['payer_email'],
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        try {
            $session = $stripe->checkout->sessions->create([
                'mode' => 'payment',
                'payment_method_types' => ['card'],
                'customer_email' => $validated['payer_email'],
                'customer_creation' => 'always',
                'success_url' => route('payment.success').'?session_id={CHECKOUT_SESSION_ID}',
                'cancel_url' => route('payment.cancel'),
                'line_items' => [[
                    'quantity' => 1,
                    'price_data' => [
                        'currency' => 'gbp',
                        'unit_amount' => $validated['amount'] * 100,
                        'product_data' => [
                            'name' => "Gift for Jidenna's Baby Welcome",
                            'description' => 'A blessing gift for Jidenna and the family.',
                        ],
                    ],
                ]],
                'payment_intent_data' => [
                    'description' => "Gift for Jidenna's Baby Welcome",
                ],
                'metadata' => [
                    'occasion' => 'jidenna_baby_welcome',
                    'gift_id' => (string) $gift->id,
                    'gift_amount_gbp' => (string) $validated['amount'],
                    'payer_name' => $validated['payer_name'],
                    'payer_email' => $validated['payer_email'],
                    'baby_message' => $validated['message'] ?? '',
                ],
            ]);

            $gift->update([
                'stripe_checkout_session_id' => $session->id,
                'stripe_payment_intent_id' => is_string($session->payment_intent) ? $session->payment_intent : null,
            ]);
        } catch (ApiErrorException $e) {
            logger()->error('Stripe checkout error: '.$e->getMessage());
            $gift->update([
                'status' => 'failed',
                'stripe_failure_message' => $e->getMessage(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['amount' => 'Payment could not be started. Please try again or contact us if this continues.']);
        }

        return redirect()->away($session->url, 303);
    }

    public function success(Request $request)
    {
        $sessionId = $request->query('session_id');

        if (! $sessionId) {
            return redirect('/');
        }

        $secret = config('services.stripe.secret');

        if (! $secret) {
            return redirect('/');
        }

        try {
            $stripe = new StripeClient($secret);
            $session = $stripe->checkout->sessions->retrieve($sessionId);
            $paid = $session->payment_status === 'paid';
        } catch (ApiErrorException $e) {
            logger()->error('Stripe session retrieval error: '.$e->getMessage());
            $paid = false;
        }

        return view('welcome', ['paymentStatus' => $paid ? 'success' : 'cancel']);
    }

    public function cancel()
    {
        return view('welcome', ['paymentStatus' => 'cancel']);
    }
}
