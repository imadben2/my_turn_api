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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('specialty');
            $table->string('image');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('status')->default(0); // status
            $table->string('password');
            $table->string('date_of_birth')->nullable();; // Date of birth
            $table->string('phone_number'); // Phone number
            $table->string('wilaya')->nullable();; // Province/Region
            $table->string('commune')->nullable();; // Municipality
            $table->string('Location')->nullable();; // Location
            $table->string('sexe')->nullable();; // sexe
            $table->text('about')->nullable();; // About
            $table->string('availability_start')->nullable();; // Availability
            $table->string('availability_end')->nullable();; // Availability
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
