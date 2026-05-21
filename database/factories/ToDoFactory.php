<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ToDo>
 */
class ToDoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "content" => $this->faker->sentence(5),
            "completed" => $this->faker->boolean(),
            "priority" => $this->faker->randomElement(["low", "medium", "high"]),
            "created_by" => User::factory(),
        ];
    }
}
