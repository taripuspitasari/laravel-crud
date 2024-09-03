<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Post::create([
        //     'title' => 'Damenjo cepet moveon',
        //     'author_id' => 1,
        //     'category_id' => 1,
        //     'slug' => 'damenjo-cepet-moveon',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat perspiciatis iusto reiciendis a voluptas nemo sint nostrum facilis earum aut, quisquam unde quas alias eligendi beatae tempore placeat iste rerum minima ea molestiae! Nesciunt distinctio fugiat quia iure numquam ipsa magni corporis incidunt! Ducimus, nam expedita dolore iste aliquid repellat!'
        // ]);

        $this->call([CategorySeeder::class, UserSeeder::class]);
        Post::factory(50)->recycle([
            Category::all(),
            User::all()
        ])->create();
    }
}
