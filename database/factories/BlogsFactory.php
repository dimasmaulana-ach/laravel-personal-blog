<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blogs>
 */
class BlogsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=> fake()->sentence(mt_rand(3,5)),
            'slug'=> fake()->slug(4),
            'body'=> fake()->paragraph(mt_rand(80, 150)),
            'user_id'=> mt_rand(1,5),
            'category_id'=> mt_rand(1,5),
        ];
    }
}
