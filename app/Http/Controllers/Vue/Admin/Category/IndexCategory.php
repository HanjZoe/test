<?php

namespace App\Http\Controllers\Vue\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class IndexCategory extends Controller
{
    public function __invoke()
    {
        $categories = Category::all();
        return $categories;
    }
}
