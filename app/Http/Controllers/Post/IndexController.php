<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        $posts = Post::paginate(6);
        if(count($categories) > 4){
            $randomPosts = Post::get()->random(4);
        } else{
            $randomPosts = $posts;
        }
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);

        $postCount = 1;

      return view('Main.mainpage', compact('categories', 'posts','likedPosts','postCount','randomPosts'));
    }
}
