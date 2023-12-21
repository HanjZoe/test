<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Tag;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {

        $data = $request->validated();
        $post =  $this->service->update($data, $post);



        return view('Admin.Post.Show',compact('post'));
    }
}
