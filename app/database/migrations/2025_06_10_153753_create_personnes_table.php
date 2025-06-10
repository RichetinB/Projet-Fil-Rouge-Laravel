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
        $table->tinyInteger('civilite'); // 1: M./Mme
        $table->string('nom');
        $table->string('prenom');
        $table->string('email')->unique();
        $table->string('telephone')->nullable();
        $table->unsignedBigInteger('entreprise_id')->nullable(); 
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
