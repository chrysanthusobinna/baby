A new gift has been received for Jidenna.

Amount: £{{ $gift->amount }}
Name: {{ $gift->payer_name ?: 'Not provided' }}
Email: {{ $gift->payer_email ?: 'Not provided' }}
Status: {{ $gift->status }}

Message:
{{ $gift->message ?: 'No message provided.' }}

Stripe Checkout Session: {{ $gift->stripe_checkout_session_id ?: 'N/A' }}
