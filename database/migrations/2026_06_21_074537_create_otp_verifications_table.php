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
        Schema::create('otp_verifications', function (Blueprint $table) {

            $table->id();

            $table->string('mobile');

            $table->string('otp', 10);

            $table->timestamp('expires_at');

            $table->timestamp('verified_at')->nullable();

            $table->integer('attempts')->default(0);

            $table->string('ip_address', 45)->nullable();

            $table->timestamps();

            $table->index('mobile');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otp_verifications');
    }
};