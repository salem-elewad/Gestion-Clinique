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
        Schema::create('analyses', function (Blueprint $table) {

            $table->id();
            $table->string('type_analyse');
            $table->float('prix_analyse');
            $table->unsignedBigInteger('id_medecin');
            $table->foreign('id_medecin')->references('id')->on('medecins');
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->date('date_analyse')->nullable();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};
