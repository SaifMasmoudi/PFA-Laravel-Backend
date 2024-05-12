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
        Schema::create('niveau_matieres', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_niveau')->constrained('niveaux');
            $table->foreignId('id_matiere')->constrained('matieres');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveau_matieres');
    }
};
