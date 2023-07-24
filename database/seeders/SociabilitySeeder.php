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
            'cats',
            'dogs',
            'kids',
            'strangers',
        ];

        foreach ($sociabilities as $sociability) {
            Sociability::create([
                'name' => $sociability,
            ]);
        }
    }
}
