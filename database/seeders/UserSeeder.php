<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\User;
use App\Models\VeterinaryCare;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('user'),
        ]);

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'is_admin' => true,
        ]);

        User::factory()->count(10)->hasProfile()->create()->each(function ($user) {
            Pet::factory()
                ->count(3)
                ->withSociabilities()
                ->withVeterinaryCares()
                ->withTemperaments()
                ->withMedia()
                ->create([
                    'user_id' => $user->id,
                ]);
        });
    }
}