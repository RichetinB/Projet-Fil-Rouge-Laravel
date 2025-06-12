<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Civilite;

class CiviliteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Civilite::insert([
            ['label' => 'Monsieur'],
            ['label' => 'Madame'],
            ['label' => 'Autre'],
        ]);
    }
}
