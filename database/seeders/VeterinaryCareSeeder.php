<?php

namespace Database\Seeders;

use App\Models\VeterinaryCare;
use Illuminate\Database\Seeder;

class VeterinaryCareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $veterinaryCares = [
            'Neutered',
            'Vaccinated',
            'Dewormed',
            'Needs special care',
        ];

        foreach ($veterinaryCares as $veterinaryCare) {
            VeterinaryCare::create([
                'name' => $veterinaryCare,
            ]);
        }
    }
}
