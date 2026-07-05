<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class);

Route::post('/checkout', [CheckoutController::class, 'store'])->name('stripe.checkout');
Route::get('/payment/success', [CheckoutController::class, 'success'])->name('payment.success');
Route::get('/payment/cancel', [CheckoutController::class, 'cancel'])->name('payment.cancel');

Route::post('/stripe/webhook', StripeWebhookController::class)->name('stripe.webhook');

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.post');
Route::middleware('auth')->group(function (): void {
    Route::get('/admin/gifts', [AdminController::class, 'gifts'])->name('admin.gifts');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
});
