<?php

namespace Database\Factories;

use App\Models\Sociability;
use App\Models\State;
use App\Models\Temperament;
use App\Models\User;
use App\Models\VeterinaryCare;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pet>
 */
class PetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $state = State::inRandomOrder()->first();
        $city = $state->cities()->inRandomOrder()->first();

        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'specie' => $this->faker->randomElement(['dog', 'cat']),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->randomElement(['puppy', 'adult', 'senior']),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'state_id' => $state->id,
            'city_id' => $city->id,
            'description' => $this->faker->paragraph,
            'is_adopted' => 0,
            'is_visible' => 1,
        ];
    }

    public function withSociabilities(): self
    {
        return $this->afterCreating(function ($pet) {
            $sociabilities = Sociability::pluck('id')->toArray();

            $pet->sociabilities()->attach($sociabilities);
        });
    }

    public function withVeterinaryCares(): self
    {
        return $this->afterCreating(function ($pet) {
            $veterinaryCares = VeterinaryCare::pluck('id')->toArray();

            $pet->veterinaryCares()->attach($veterinaryCares);
        });
    }

    public function withTemperaments(): self
    {
        return $this->afterCreating(function ($pet) {
            $temperaments = Temperament::pluck('id')->toArray();

            $pet->temperaments()->attach($temperaments);
        });
    }

    public function withMedia(): self
    {
        return $this->afterCreating(function ($pet) {

            $pet->addMediaFromUrl(asset("assets/images/" . $pet->specie . rand(1, 10) . ".jpg"))
                ->toMediaCollection('pets');
        });
    }
}
