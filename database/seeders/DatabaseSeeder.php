<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\PetSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\SociabilitySeeder;
use Database\Seeders\TemperamentSeeder;
use Database\Seeders\VeterinaryCareSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            SociabilitySeeder::class,
            TemperamentSeeder::class,
            VeterinaryCareSeeder::class,
            PetSeeder::class,
        ]);
    }
}