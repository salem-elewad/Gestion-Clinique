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
        Schema::create('specialistes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_specialite');
            $table->unsignedBigInteger('id_medecin');
            $table->foreign('id_medecin')->references('id')->on('medecins');
            $table->unsignedBigInteger('id_service');
            $table->foreign('id_service')->references('id')->on('services');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialistes');
    }
};
