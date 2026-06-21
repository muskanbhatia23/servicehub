<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('provider_profiles', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('state_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('profile_image')->nullable();

            $table->text('about')->nullable();

            $table->date('trial_start_date')->nullable();

            $table->date('trial_end_date')->nullable();

            $table->enum('subscription_status', [
                'trial',
                'active',
                'expired',
                'suspended'
            ])->default('trial');

            $table->enum('profile_status', [
                'pending',
                'approved',
                'rejected',
                'suspended'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_profiles');
    }
};