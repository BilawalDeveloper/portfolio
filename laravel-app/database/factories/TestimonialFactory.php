<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_name' => fake()->name(),
            'client_title' => fake()->jobTitle(),
            'client_company' => fake()->company(),
            'client_avatar' => null,
            'content' => fake()->paragraph(3),
            'rating' => fake()->numberBetween(4, 5),
            'project_type' => fake()->randomElement(['RAG System', 'AI Development', 'Web Development', 'Mobile App']),
            'order' => fake()->numberBetween(1, 10),
            'is_featured' => fake()->boolean(30),
            'is_published' => fake()->boolean(90),
        ];
    }
}
