<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personne;
use App\Models\Civilite;
use Illuminate\Support\Facades\DB;

class PersonneSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('personnes')->truncate();
        $civilite = Civilite::first(); 

        if (!$civilite) {
            $civilite = Civilite::create(['label' => 'Monsieur']);
        }

        Personne::create([
            'civilite_id' => $civilite->id,
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'email' => 'jean.dupont@example.com',
            'telephone' => fake()->phoneNumber(),
            'localisation_id' => 1,
            'entreprise_id' => 1
        ]);
    }
}
