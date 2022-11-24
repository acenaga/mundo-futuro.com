<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
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
            'featured_image' => fake()->imageUrl(1920, 1080, 'cats', true),
            'name' => fake()->sentence(),
            'slug' => fake()->slug(),
            'description' => fake()->paragraphs(3, true),
            'video' => 'https://www.youtube.com/watch?v=o-YBDTqX_ZU',
            'requirements' => fake()->paragraph(),
            'free' => rand(0, 1),
            'price' => rand(500, 10000),
            'discount' => rand(10, 100),
            'discount_price' => rand(250, 5000),
            'slug' => fake()->slug(),
            'duration' => rand(30, 560),
            'level' => 'beginner'
        ];
    }
}
