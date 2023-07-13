<?php

namespace Database\Factories;

use App\Models\User;
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
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name,
            'specie' => $this->faker->randomElement(['dog', 'cat']),
            'sex' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->numberBetween(['infant', 'young', 'adult', 'senior']),
            'size' => $this->faker->randomElement(['small', 'medium', 'large']),
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'main_photo' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'is_adopted' => $this->faker->boolean,
            'is_visible' => $this->faker->boolean,
            'has_special_needs' => $this->faker->boolean,
        ];
    }
}