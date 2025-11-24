<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
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
            'image_placeholder' => null,
            'link' => fake()->url(),
            'tags' => fake()->randomElements(['Laravel', 'React', 'Vue', 'PHP', 'JavaScript', 'AI', 'ML'], rand(2, 4)),
            'order' => fake()->numberBetween(1, 10),
            'is_featured' => fake()->boolean(70),
            'is_published' => fake()->boolean(90),
        ];
    }
}
