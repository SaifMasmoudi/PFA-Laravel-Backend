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
        Schema::create('annee_universitaires', function (Blueprint $table) {
            $table->id();
            $table->string('nom_annee');
            $table->unsignedBigInteger('id_charge_horaire');
            $table->foreign('id_charge_horaire')
            ->references('id')
            ->on('charge_horaires')
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
        Schema::dropIfExists('annee_universitaires');
    }
};
