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
        Schema::table('patients', function (Blueprint $table) {
            // Supprimer la contrainte de clé étrangère
            $table->dropForeign('patients_analyse_id_foreign');
            // Supprimer la colonne 'analyse_id' de la table 'patients'
            $table->dropColumn('analyse_id');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            // Ajouter la colonne 'analyse_id' de nouveau (dans la méthode down(), nous utilisons la même signature que dans la méthode up())
            $table->unsignedBigInteger('analyse_id');
            // Re-créer la contrainte de clé étrangère si nécessaire
            $table->foreign('analyse_id')->references('id')->on('analyses')->onDelete('cascade');
        });
    }
};
