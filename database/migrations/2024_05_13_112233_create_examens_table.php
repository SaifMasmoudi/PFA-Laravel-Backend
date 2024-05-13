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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string('nom_examen');
            $table->string('date_examen');
            $table->string('heure_debut');
            $table->string('heure_fin');
            $table->unsignedBigInteger('id_niveau_matiere');
            $table->foreign('id_niveau_matiere')
            ->references('id')
            ->on('niveau_matieres')
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
        Schema::dropIfExists('examens');
    }
};
