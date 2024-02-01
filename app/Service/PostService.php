<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class PostService
{
    public function store($data)
    {
        try {

            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
    $previewImagePath = Storage::disk('public')->put('/images', $data['preview_image']);

    $mainImagePath = Storage::disk('public')->put('/images', $data['main_image']);
    $data['preview_image'] = $previewImagePath;
    $data['main_image'] = $mainImagePath;
//   unset($data['preview_image']);
//   unset($data['main_image']);
            $post = Post::firstOrCreate($data);
            if (isset($tagIds)) {
                $post->tags()->attach($tagIds);
            }

            DB::commit();
        } catch (\Exception $exception) {

            DB::rollBack();
            abort(500);

        }
    }

    public function update($data, $post)
    {
        try {

            DB::beginTransaction();
            if (isset($data['tag_ids'])) {
                $tagIds = $data['tag_ids'];
                unset($data['tag_ids']);
            }
if(isset($data['preview_image'])){
    $previewImagePath = Storage::disk('public')->put('/images', $data['preview_image']);
    $data['preview_image'] = $previewImagePath;
} else {
    $data['preview_image'] = $post->preview_image;
}
if(isset($data['main_image'])){
    $mainImagePath = Storage::disk('public')->put('/images', $data['main_image']);
    $data['main_image'] = $mainImagePath;
} else {
    $data['main_image'] = $post->main_image;
}


//      unset($data['preview_image']);
//      unset($data['main_image']);
            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
            return $post;
        } catch (\Exception $exception) {
            dd($data);
            DB::rollBack();
            abort(500);
        }

    }
}
