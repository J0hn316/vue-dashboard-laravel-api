<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Todo;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a new todo item
        Todo::create([
            'title' => 'Buy groceries',
            'description' => 'Buy milk, eggs, and bread',
            'completed' => false,
            'user_id' => 1
        ]);

        Todo::create([
            'title' => 'Finish dashboard project',
            'description' => 'Finish the dashboard project for the company',
            'completed' => false,
            'user_id' => 2
        ]);

        Todo::create([
            'title' => 'Cut the lawn',
            'description' => 'Cut the lawn for the weekend',
            'completed' => false,
            'user_id' => 3
        ]);
    }
}
