# Jidenna Baby Welcome

A warm single-page Laravel website for welcoming baby Jidenna. Guests can read the welcome message, choose a gift amount, leave a note for the family, and pay securely through Stripe Checkout.

## Preview Images

### Main Welcome Hero

![Jidenna baby welcome hero](public/images/jidenna-welcome-hero.png)

### Fallback Social Preview Image

![Jidenna baby welcome fallback hero](public/images/jidenna-dedication-hero.png)

### Favicon

![Site favicon](public/favicon.ico)

## Features

- Single-page baby welcome website
- Mobile-friendly hero layout
- Stripe Checkout payment flow
- Fixed amount buttons and custom amount entry
- Optional guest message for the baby and family
- WhatsApp and social sharing meta tags
- SQLite-ready Laravel setup

## Run Locally

```powershell
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Open:

```text
http://127.0.0.1:8000
```

## Stripe Setup

Add your Stripe keys to `.env`:

```env
STRIPE_KEY=pk_test_your_publishable_key
STRIPE_SECRET=sk_test_your_secret_key
```

Then clear cached config:

```powershell
php artisan config:clear
```

For social sharing previews, set `APP_URL` to the live domain before deployment:

```env
APP_URL=https://your-real-domain.com
```
