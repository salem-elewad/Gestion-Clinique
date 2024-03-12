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
        Schema::create('soins', function (Blueprint $table) {
            $table->id();
            $table->float('prix_soins');
            $table->string('type_soins');
            $table->unsignedBigInteger('id_patient');
            $table->foreign('id_patient')->references('id')->on('patients');
            $table->date('date_soins')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soins');
    }
};
