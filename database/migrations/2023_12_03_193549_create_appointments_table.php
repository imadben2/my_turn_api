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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id'); // Foreign key column.
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade'); // Optional: cascade on delete.


            $table->unsignedBigInteger('doctors_id'); // Foreign key column.
            $table->foreign('doctors_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade'); // Optional: cascade on delete.


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
