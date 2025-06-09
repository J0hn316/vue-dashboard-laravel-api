<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Post::truncate();
        $this->call(PostSeeder::class);
        $this->call(TodoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
