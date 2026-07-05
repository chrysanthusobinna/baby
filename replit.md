# Jidenna's Dedication

A Laravel 13 gift page for Jidenna's baby dedication celebration. Visitors can choose a gift amount in GBP and pay securely via Stripe Checkout.

## Stack

- **PHP 8.4** / **Laravel 13**
- **SQLite** (database file at `database/database.sqlite`)
- **Stripe PHP SDK** — Stripe Checkout for one-time GBP payments
- **Bootstrap 5** (CDN) + custom CSS
- **Vite** for asset bundling

## How to run

```bash
php artisan serve --host=0.0.0.0 --port=5000
```

The workflow "Start application" handles this automatically.

## Environment variables / secrets

| Key | Purpose |
|---|---|
| `STRIPE_KEY` | Stripe publishable key (starts `pk_`) |
| `STRIPE_SECRET` | Stripe secret key (starts `sk_`) |

Add these as Replit Secrets. Without them the payment form shows a configuration error instead of redirecting to Stripe.

## Key files

- `routes/web.php` — all routes (homepage, `/checkout` POST, `/payment/success`, `/payment/cancel`)
- `resources/views/welcome.blade.php` — the single-page UI
- `public/images/jidenna-dedication-hero.png` — hero photo

## User preferences

- Keep the existing Laravel structure and single-page layout.
