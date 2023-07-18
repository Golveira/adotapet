<?php

namespace Database\Seeders;

use App\Models\Pet;
use App\Models\User;
use App\Models\Sociability;
use App\Models\Temperament;
use App\Models\VeterinaryCare;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sociabilities = Sociability::all();
        $temperaments = Temperament::all();
        $veterinaryCares = VeterinaryCare::all();

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

        User::factory()->count(100)->hasProfile()->create()->each(function ($user) use ($sociabilities, $temperaments, $veterinaryCares) {
            Pet::factory(4)->create(['user_id' => $user->id])
                ->each(function ($pet) use ($sociabilities, $temperaments, $veterinaryCares) {
                    $pet->sociabilities()->attach($sociabilities->random(3));
                    $pet->temperaments()->attach($temperaments->random(5));
                    $pet->veterinaryCares()->attach($veterinaryCares->random(3));
                });
        });
    }
}
