<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\VeterinaryCare;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sociabilities = Sociability::all();
        $temperaments = Temperament::all();
        $veterinaryCares = VeterinaryCare::all();

        Pet::factory(100)->create()->each(function ($pet) use ($sociabilities, $temperaments, $veterinaryCares) {
            $pet->sociabilities()->attach($sociabilities->random(3));
            $pet->temperaments()->attach($temperaments->random(5));
            $pet->veterinaryCares()->attach($veterinaryCares->random(3));
        });
    }
}