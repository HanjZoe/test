<?php

namespace App\Http\Controllers\Vue\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Vue\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return $category;
    }
}
