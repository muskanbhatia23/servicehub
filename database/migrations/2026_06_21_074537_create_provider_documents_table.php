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
        Schema::create('provider_documents', function (Blueprint $table) {

            $table->id();

            $table->foreignId('provider_profile_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->enum('document_type', [
                'aadhaar',
                'voter_card',
                'driving_license',
                'pan_card',
                'other'
            ]);

            $table->string('document_number')
                ->nullable();

            $table->string('document_front')
                ->nullable();

            $table->string('document_back')
                ->nullable();

            $table->enum('verification_status', [
                'pending',
                'approved',
                'rejected'
            ])->default('pending');

            $table->foreignId('verified_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('verified_at')
                ->nullable();

            $table->text('remarks')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_documents');
    }
};