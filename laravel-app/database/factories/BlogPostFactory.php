<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            'content' => fake()->paragraphs(5, true),
            'category' => fake()->randomElement(['AI & ML', 'Web Development', 'Mobile', 'DevOps']),
            'featured_image' => null,
            'tags' => fake()->randomElements(['AI', 'Laravel', 'React', 'PHP', 'JavaScript'], rand(2, 4)),
            'read_time' => fake()->numberBetween(3, 15),
            'published_at' => fake()->boolean(80) ? fake()->dateTimeBetween('-1 year', 'now') : null,
            'is_published' => fake()->boolean(80),
            'views' => fake()->numberBetween(0, 1000),
        ];
    }
}
