<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
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
        $this->call(UserTableSeeder::class);
        Category::factory(10)->create();
        $tags = Tag::factory(20)->create();
        $posts = Post::factory(20)->create();
        foreach ($posts as $post){
            $tagID = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagID);
        }

    }
}
