<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('personnes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('civilite_id')->constrained('civilites')->onDelete('cascade');
        $table->string('nom');
        $table->string('prenom');
        $table->string('email')->unique();
        $table->string('telephone')->nullable();
        $table->foreignId('localisation_id')->nullable()->constrained('localisations')->nullOnDelete();
        $table->foreignId('entreprise_id')->nullable()->constrained('entreprises')->nullOnDelete();
        $table->timestamps();

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
