<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new post
        Post::create([
            'title' => 'Post 1',
            'body' => 'This is the body of post 1',
            'user_id' => 1,
        ]);
        Post::create([
            'title' => 'Post 2',
            'body' => 'This is the body of post 2',
            'user_id' => 2,
        ]);
    }
}
