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
        Schema::table('resultats', function (Blueprint $table) {
            $table->string('resultat')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            // Si nécessaire, vous pouvez définir la colonne en tant que texte à nouveau dans la méthode down
            Schema::table('resultats', function (Blueprint $table) {
                $table->text('resultat')->change();
            });
    }
};
