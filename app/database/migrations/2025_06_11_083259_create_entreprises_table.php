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
    Schema::create('entreprises', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->foreignId('secteur_id')->constrained('secteurs_activite')->onDelete('cascade');
        $table->string('code_postal');
        $table->string('ville');
        $table->decimal('chiffre_affaires', 15, 2);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
