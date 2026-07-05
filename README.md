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
- Hidden admin area for viewing gifts and messages
- Gift notification emails after successful payments
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
STRIPE_WEBHOOK_SECRET=whsec_your_webhook_secret
```

Then clear cached config:

```powershell
php artisan config:clear
```

For social sharing previews, set `APP_URL` to the live domain before deployment:

```env
APP_URL=https://your-real-domain.com
```

Set the Stripe webhook endpoint to:

```text
https://your-real-domain.com/stripe/webhook
```

## Admin Setup

There is no admin link on the public website. Visit the admin login URL directly:

```text
/admin/login
```

Add admin credentials to `.env`:

```env
ADMIN_EMAIL=admin@example.com
ADMIN_NAME="Gift Admin"
ADMIN_PASSWORD=choose-a-strong-password
```

Create or update the admin user in the `users` table:

```powershell
php artisan db:seed --class=AdminUserSeeder
```

## Gift Notifications

Send paid gift notifications to a separate email address:

```env
GIFT_NOTIFICATION_EMAIL=gifts@example.com
```

Configure your mail provider through the usual Laravel `MAIL_*` environment variables.
