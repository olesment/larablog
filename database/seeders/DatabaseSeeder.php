<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
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
        User::truncate();
        Post::truncate();
        Category::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => "Personal",
            'slug' => "personal"
        ]);
        
        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family'
        ]);
        
        $work=Category::create([
            'name' => 'Work',
            'slug' => 'work'
        ]);
       
        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$family->id,
            'title'=>'My Family Post',
            'slug'=> 'my-family-post',
            'excerpt'=>'<p>Lorem Ipsum</p>',
            'body'=>'Lorem Ipsum Dolor sit amet'
        ]);

        Post::create([
            'user_id'=>$user->id,
            'category_id'=>$work->id,
            'title'=>'My work Post',
            'slug'=> 'my-work-post',
            'excerpt'=>'<p>Lorem Ipsum</p>',
            'body'=>'<p>Lorem Ipsum Dolor sit amet</p>'
        ]);

    }
}
