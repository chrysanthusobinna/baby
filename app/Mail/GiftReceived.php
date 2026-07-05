<?php

namespace App\Mail;

use App\Models\Gift;
use Illuminate\Mail\Mailable;

class GiftReceived extends Mailable
{
    public function __construct(public Gift $gift) {}

    public function build(): self
    {
        $mail = $this
            ->subject('New gift received for Jidenna')
            ->text('emails.gift-received');

        if ($this->gift->payer_email) {
            $mail->replyTo($this->gift->payer_email, $this->gift->payer_name ?: null);
        }

        return $mail;
    }
}
