<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Diary>
 */
class DiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->sentence(1),
            "body" => $this->faker->sentence(5),
            "mood" => $this->faker->randomElement(["happy", "neutral", "sad"]),
            "date" => $this->faker->dateTime(),
            "created_by" => User::factory(),
        ];
    }
}
