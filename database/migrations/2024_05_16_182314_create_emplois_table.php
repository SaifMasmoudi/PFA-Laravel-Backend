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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jour')->constrained('jours');
            $table->foreignId('id_heure')->constrained('horaires');
            $table->foreignId('id_charge_horaire')->constrained('charge_horaires');
            $table->foreignId('id_salle')->constrained('salles');
            $table->unsignedBigInteger('id_annee');
            $table->foreign('id_annee')
            ->references('nom_annee')
            ->on('annee_universitaires')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
