<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => rand(1, 5),
            'category_id' => rand(1, 5),
            'featured_image' => fake()->imageUrl(1920, 1080, 'cats', true),
            'title' => fake()->sentence(),
            'excerpt' => fake()->paragraph(),
            'slug' => fake()->slug(),
            'content' => fake()->paragraphs(3, true),

        ];
    }
}
