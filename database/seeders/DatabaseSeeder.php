<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(4)->create();

        User::factory()->create([
            'username' => 'acenaga',
            'email' => 'mundofuturoca@gmail.com',
        ]);

        Category::factory(5)->create();
        Post::factory(10)->create();
    }
}
