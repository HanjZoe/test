<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];
        $data["comments"] = auth()->user()->comments->count();
        $data["posts"] = auth()->user()->likedPosts->count();
        return view('Personal.Main.Index',compact('data'));
    }
}
