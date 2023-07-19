<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\State;
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
            'is_adopted' => $this->faker->boolean,
            'is_visible' => $this->faker->boolean,
            'has_special_needs' => $this->faker->boolean,
        ];
    }
}
