<?php

namespace Tests\Feature;

use App\Models\Gift;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminGiftsTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_login_and_view_gifts_and_messages(): void
    {
        User::create([
            'name' => 'Gift Admin',
            'email' => 'admin@example.com',
            'password' => 'secret-password',
        ]);

        Gift::create([
            'amount' => 50,
            'currency' => 'gbp',
            'payer_name' => 'Ada Parent',
            'payer_email' => 'ada@example.com',
            'message' => 'Blessings for Jidenna.',
            'status' => 'paid',
        ]);

        $this->post(route('admin.login.post'), [
            'email' => 'admin@example.com',
            'password' => 'secret-password',
        ])->assertRedirect(route('admin.gifts'));

        $this->get(route('admin.gifts'))
            ->assertOk()
            ->assertSee('Ada Parent')
            ->assertSee('Blessings for Jidenna.');
    }

    public function test_admin_gifts_page_only_shows_paid_gifts(): void
    {
        User::create([
            'name' => 'Gift Admin',
            'email' => 'admin@example.com',
            'password' => 'secret-password',
        ]);

        Gift::create([
            'amount' => 50,
            'currency' => 'gbp',
            'payer_name' => 'Paid Gift',
            'payer_email' => 'paid@example.com',
            'message' => 'This should appear.',
            'status' => 'paid',
        ]);

        Gift::create([
            'amount' => 25,
            'currency' => 'gbp',
            'payer_name' => 'Pending Gift',
            'payer_email' => 'pending@example.com',
            'message' => 'This should not appear.',
            'status' => 'pending',
        ]);

        $this->post(route('admin.login.post'), [
            'email' => 'admin@example.com',
            'password' => 'secret-password',
        ])->assertRedirect(route('admin.gifts'));

        $this->get(route('admin.gifts'))
            ->assertOk()
            ->assertSee('Paid Gift')
            ->assertSee('This should appear.')
            ->assertDontSee('Pending Gift')
            ->assertDontSee('This should not appear.');
    }

    public function test_admin_gifts_page_requires_login(): void
    {
        $this->get(route('admin.gifts'))
            ->assertRedirect(route('login'));
    }
}
