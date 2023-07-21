<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
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
            'website' => $this->faker->url,
            'whatsapp' => $this->faker->phoneNumber,
            'location' => $this->faker->city() . ', ' . $this->faker->citySuffix(),
            'bio' => $this->faker->paragraph,
        ];
    }
}
