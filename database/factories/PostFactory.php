<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
            'subject' => fake()->name(),
            'content' => fake()->text(),
            'category_id' => random_int(1, 5),
            'thumbnail' => fake()->image(),
            'link_video' => fake()->imageUrl(),
            'link_driver' => fake()->imageUrl(),
            'member_id' => random_int(1, 3)
        ];
    }
}
