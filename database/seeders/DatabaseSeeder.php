<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Course;
use App\Models\Post;
use App\Models\User;

use Illuminate\Database\Seeder;
use League\CommonMark\Extension\CommonMark\Node\Inline\Code;

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
            'email' => 'mundofuturoca@gmail.com','password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        Category::factory(5)->create();
        Post::factory(10)->create();
        Comment::factory(20)->create();
        Course::factory(20)->create();
    }
}
