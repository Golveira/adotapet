<?php

namespace Tests;

use App\Models\Pet;
use App\Models\User;
use Database\Seeders\CityTableSeeder;
use Database\Seeders\StateTableSeeder;
use Database\Seeders\SociabilitySeeder;
use Database\Seeders\TemperamentSeeder;
use Database\Seeders\VeterinaryCareSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(StateTableSeeder::class);
        $this->seed(CityTableSeeder::class);
        $this->seed(SociabilitySeeder::class);
        $this->seed(TemperamentSeeder::class);
        $this->seed(VeterinaryCareSeeder::class);
    }

    protected function createPet($overrides = []): Pet
    {
        return Pet::factory()->create($overrides);
    }

    protected function createUser($overrides = []): User
    {
        return User::factory()->create($overrides);
    }
}
