<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Stripe\StripeClient;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/checkout', function (Request $request) {
    $validated = $request->validate([
        'amount' => ['required', 'integer', 'min:1', 'max:10000'],
        'message' => ['nullable', 'string', 'max:500'],
    ]);

    $secret = config('services.stripe.secret');

    if (! $secret) {
        return back()
            ->withInput()
            ->withErrors(['amount' => 'Stripe is not configured yet. Add STRIPE_SECRET to your .env file.']);
    }

    $amountInPence = $validated['amount'] * 100;
    $stripe = new StripeClient($secret);

    try {
        $session = $stripe->checkout->sessions->create([
            'mode' => 'payment',
            'payment_method_types' => ['card'],
            'success_url' => route('payment.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payment.cancel'),
            'line_items' => [[
                'quantity' => 1,
                'price_data' => [
                    'currency' => 'gbp',
                    'unit_amount' => $amountInPence,
                    'product_data' => [
                        'name' => "Gift for Jidenna's Baby Dedication",
                        'description' => 'A blessing gift for Jidenna and the family.',
                    ],
                ],
            ]],
            'payment_intent_data' => [
                'description' => "Gift for Jidenna's Baby Dedication",
            ],
            'metadata' => [
                'occasion' => 'jidenna_baby_dedication',
                'gift_amount_gbp' => (string) $validated['amount'],
                'baby_message' => $validated['message'] ?? '',
            ],
        ]);
    } catch (\Stripe\Exception\ApiErrorException $e) {
        logger()->error('Stripe checkout error: '.$e->getMessage());

        return back()
            ->withInput()
            ->withErrors(['amount' => 'Payment could not be started. Please try again or contact us if this continues.']);
    }

    return redirect()->away($session->url, 303);
})->name('stripe.checkout');

Route::get('/payment/success', function (Request $request) {
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
    } catch (\Stripe\Exception\ApiErrorException $e) {
        logger()->error('Stripe session retrieval error: '.$e->getMessage());
        $paid = false;
    }

    return view('welcome', ['paymentStatus' => $paid ? 'success' : 'cancel']);
})->name('payment.success');

Route::get('/payment/cancel', function () {
    return view('welcome', ['paymentStatus' => 'cancel']);
})->name('payment.cancel');
