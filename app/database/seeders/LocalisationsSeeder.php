<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localisation;

class LocalisationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localisations = [
            ['name' => 'Paris'],
            ['name' => 'Lyon'],
            ['name' => 'Marseille'],
            ['name' => 'Toulouse'],
            ['name' => 'Bordeaux'],
            ['name' => 'Lille'],
            ['name' => 'Nantes'],
            ['name' => 'Strasbourg'],
            ['name' => 'Nice'],
            ['name' => 'Rennes'],
        ];


        foreach ($localisations as $localisation) {
            Localisation::create($localisation);
        }   
     }
}
