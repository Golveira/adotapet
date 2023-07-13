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
            'state' => $this->faker->state,
            'city' => $this->faker->city,
            'avatar' => $this->faker->imageUrl(),
            'bio' => $this->faker->paragraph,
        ];
    }
}