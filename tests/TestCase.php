<?php

namespace Tests;

use Database\Seeders\CityTableSeeder;
use Database\Seeders\SociabilitySeeder;
use Database\Seeders\StateTableSeeder;
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
    }
}