<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
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
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(6),
            'author_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text()
        ];
    }
}

// App\Models\Post::factory(200)->recycle(User::factory(5)->create())->create();