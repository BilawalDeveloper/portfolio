<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'slug' => fake()->slug(),
            'description' => fake()->paragraph(),
            'icon' => null,
            'features' => fake()->randomElements(['Feature 1', 'Feature 2', 'Feature 3', 'Feature 4'], rand(2, 3)),
            'pricing' => 'From $' . fake()->numberBetween(1000, 10000),
            'order' => fake()->numberBetween(1, 10),
            'is_published' => fake()->boolean(90),
        ];
    }
}
