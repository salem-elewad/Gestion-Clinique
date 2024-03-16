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
        {
            Schema::create('examen_analyse', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('examen_id');
                $table->unsignedBigInteger('analyse_id');
                $table->timestamps();
    
                // Ajouter les contraintes de clé étrangère
                $table->foreign('examen_id')->references('id')->on('examens')->onDelete('cascade');
                $table->foreign('analyse_id')->references('id')->on('analyses')->onDelete('cascade');
            });
    }}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examen_analyse');
    }
};
