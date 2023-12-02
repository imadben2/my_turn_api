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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('user_name')->unique();
            $table->string('password');

            $table->date('date_naissance')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('wilaya')->nullable();
            $table->string('commune')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->integer('poids')->nullable();
            $table->integer('taille')->nullable();
            $table->boolean('maladie_chronique')->default(false);
            $table->boolean('affiche_groupe_sanguin')->default(false);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
