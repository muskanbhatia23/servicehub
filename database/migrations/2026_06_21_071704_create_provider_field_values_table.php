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
       Schema::create('provider_field_values', function (Blueprint $table) {

    $table->id();

    $table->foreignId('provider_profile_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->foreignId('category_field_id')
        ->constrained()
        ->cascadeOnDelete();

    $table->longText('value')->nullable();

    $table->timestamps();

    $table->unique(
        ['provider_profile_id', 'category_field_id'],
        'pfv_profile_field_unique'
    );
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provider_field_values');
    }
};