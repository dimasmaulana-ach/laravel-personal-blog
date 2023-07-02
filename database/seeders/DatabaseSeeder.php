<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Blogs;
use \App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        Category::create([
            'name' => 'Personal'
        ]);

        Category::create([
            'name' => 'Website'
        ]);

        Category::create([
            'name' => 'Programming'
        ]);

        Category::create([
            'name' => 'Security'
        ]);

        Category::create([
            'name' => 'Operating System'
        ]);

        Blogs::factory(100)->create();       

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
