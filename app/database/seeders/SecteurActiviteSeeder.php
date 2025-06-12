<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SecteurActivite;
class SecteurActiviteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $secteurs = [
            ['label' => 'Technologie'],
            ['label' => 'Finance'],
            ['label' => 'Santé'],
            ['label' => 'Éducation'],
            ['label' => 'Commerce'],
        ];

        foreach ($secteurs as $secteur) {
            SecteurActivite::create($secteur);
        }
    }
}
