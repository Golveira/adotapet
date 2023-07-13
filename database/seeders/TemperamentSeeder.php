<?php

namespace Database\Seeders;

use App\Models\Temperament;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TemperamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $temperaments = [
            'Docile',
            'Aggressive',
            'Calm',
            'Energetic',
            'Playful',
            'Timid',
            'Sociable',
            'Unsociable',
            'Independent',
            'Needy'
        ];

        foreach ($temperaments as $temperament) {
            Temperament::create([
                'name' => $temperament,
            ]);
        }
    }
}