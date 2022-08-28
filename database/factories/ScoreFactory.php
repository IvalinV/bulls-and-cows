<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'bulls_found' => $this->faker->randomDigit,
            'cows_found' => $this->faker->randomDigit,
            'full_numbers_found' => $this->faker->randomDigit
        ];
    }
}
