<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //\App\Models\User::factory(10)->create();
        $user = User::factory()->create();

        Category::create([
            'name' => "Personal",
            'slug' => "personal"
        ]);
        
        Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        
        Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
