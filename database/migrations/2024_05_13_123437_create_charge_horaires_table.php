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
        Schema::create('charge_horaires', function (Blueprint $table) {
            $table->id();
            $table->string('nb_heure');
            $table->foreignId('id_niveau_matiere')->constrained('niveau_matieres');
            $table->foreignId('id_enseignant')->constrained('enseignants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charge_horaires');
    }
};
