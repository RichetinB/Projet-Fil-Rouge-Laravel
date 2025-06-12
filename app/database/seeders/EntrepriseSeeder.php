<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entreprise;

class EntrepriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entreprise::create([
            'nom' => 'TechNova',
            'secteur_id' => 1, 
            'code_postal' => '75001',
            'ville' => 'Paris',
            'chiffre_affaires' => 1250000.50,
        ]);

        Entreprise::create([
            'nom' => 'FinCorp',
            'secteur_id' => 2, 
            'code_postal' => '69000',
            'ville' => 'Lyon',
            'chiffre_affaires' => 2130000.00,
        ]);
    }
}
