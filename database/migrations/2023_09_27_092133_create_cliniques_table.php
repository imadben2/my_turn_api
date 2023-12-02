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
        Schema::create('cliniques', function (Blueprint $table) {
            $table->id();
            $table->string('specialty');
            $table->string('image');

            $table->unsignedBigInteger('medecins_id'); // Foreign key column.
            $table->foreign('medecins_id')
                ->references('id')
                ->on('medecins')
                ->onDelete('cascade'); // Optional: cascade on delete.

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliniques');
    }
};
