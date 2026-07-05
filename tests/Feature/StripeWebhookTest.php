<?php

namespace Tests\Feature;

use App\Mail\GiftReceived;
use App\Models\Gift;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class StripeWebhookTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_marks_a_gift_as_paid_when_stripe_sends_a_completed_checkout_session_webhook(): void
    {
        Mail::fake();
        config(['gifts.notification_email' => 'gifts@example.com']);

        $gift = Gift::create([
            'amount' => 25,
            'currency' => 'gbp',
            'payer_name' => 'Ada Parent',
            'payer_email' => 'ada@example.com',
            'message' => 'Blessings for Jidenna.',
            'status' => 'pending',
            'stripe_checkout_session_id' => 'cs_test_completed',
        ]);

        $this->postJson(route('stripe.webhook'), [
            'type' => 'checkout.session.completed',
            'data' => [
                'object' => [
                    'id' => 'cs_test_completed',
                    'payment_intent' => 'pi_test_completed',
                    'customer_email' => 'ada@example.com',
                    'customer_details' => [
                        'name' => 'Ada Parent',
                        'email' => 'ada@example.com',
                    ],
                    'metadata' => [
                        'gift_id' => (string) $gift->id,
                    ],
                ],
            ],
        ])->assertOk();

        $gift->refresh();

        $this->assertSame('paid', $gift->status);
        $this->assertSame('pi_test_completed', $gift->stripe_payment_intent_id);
        $this->assertSame('Ada Parent', $gift->payer_name);
        $this->assertSame('ada@example.com', $gift->payer_email);
        $this->assertNotNull($gift->notification_sent_at);

        Mail::assertSent(GiftReceived::class);
    }

    public function test_it_marks_a_gift_as_failed_when_stripe_sends_a_failed_payment_intent_webhook(): void
    {
        $gift = Gift::create([
            'amount' => 25,
            'currency' => 'gbp',
            'payer_name' => 'Ada Parent',
            'payer_email' => 'ada@example.com',
            'message' => 'Blessings for Jidenna.',
            'status' => 'pending',
            'stripe_payment_intent_id' => 'pi_test_failed',
        ]);

        $this->postJson(route('stripe.webhook'), [
            'type' => 'payment_intent.payment_failed',
            'data' => [
                'object' => [
                    'id' => 'pi_test_failed',
                    'last_payment_error' => [
                        'message' => 'Your card was declined.',
                    ],
                ],
            ],
        ])->assertOk();

        $gift->refresh();

        $this->assertSame('failed', $gift->status);
        $this->assertSame('Your card was declined.', $gift->stripe_failure_message);
    }
}
