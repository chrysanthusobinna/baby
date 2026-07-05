<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    protected $fillable = [
        'amount',
        'currency',
        'payer_name',
        'payer_email',
        'message',
        'status',
        'stripe_checkout_session_id',
        'stripe_payment_intent_id',
        'stripe_failure_message',
        'notification_sent_at',
    ];

    protected function casts(): array
    {
        return [
            'notification_sent_at' => 'datetime',
        ];
    }
}
