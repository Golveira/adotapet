<?php

namespace Database\Seeders;

use App\Models\Sociability;
use Illuminate\Database\Seeder;

class SociabilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sociabilities = [
            'OK with cats',
            'OK with dogs',
            'OK with kids',
        ];

        foreach ($sociabilities as $sociability) {
            Sociability::create([
                'name' => $sociability,
            ]);
        }
    }
}
