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
        Schema::create('interventions', function (Blueprint $table) {
            $table->id();
            $table->float('prix_intervention');
            $table->unsignedBigInteger('id_specialiste');
            $table->foreign('id_specialiste')->references('id')->on('specialistes');
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services');
            $table->date('date_intervention')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interventions');
    }
};
