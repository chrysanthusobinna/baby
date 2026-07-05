<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('gifts', function (Blueprint $table): void {
            $table->string('payer_name')->nullable()->after('currency');
            $table->string('payer_email')->nullable()->after('payer_name');
            $table->timestamp('notification_sent_at')->nullable()->after('stripe_failure_message');
        });
    }

    public function down(): void
    {
        Schema::table('gifts', function (Blueprint $table): void {
            $table->dropColumn([
                'payer_name',
                'payer_email',
                'notification_sent_at',
            ]);
        });
    }
};
