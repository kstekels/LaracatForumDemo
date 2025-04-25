<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory(10)
            ->withPersonalTeam()
            ->create();

        $posts = Post::factory(200)
            ->recycle($user)
            ->create();

        Comment::factory(100)
            ->recycle($user)
            ->recycle($posts)
            ->create();

        $karlis = User::factory()
            ->withPersonalTeam()
            ->has(
                Post::factory(100)
            )
            ->has(
                Comment::factory(120)
                    ->recycle($posts)
            )
            ->create([
                'name' => 'Karlis',
                'email' => 'k.stekels+test@gmail.com'
            ]);
    }
}
