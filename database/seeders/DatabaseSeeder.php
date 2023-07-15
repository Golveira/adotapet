<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\PetSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\StateTableSeeder;
use Database\Seeders\SociabilitySeeder;
use Database\Seeders\TemperamentSeeder;
use Database\Seeders\VeterinaryCareSeeder;
use Guiliredu\BrazilianCityMigrationSeed\Database\Seeds\CitySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StateTableSeeder::class,
            CityTableSeeder::class,
            SociabilitySeeder::class,
            TemperamentSeeder::class,
            VeterinaryCareSeeder::class,
            UserSeeder::class,
        ]);
    }
}
