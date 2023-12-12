<?php


namespace App\Service;


use App\Models\Post;
use Illuminate\Support\Facades\DB;

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
//    $previewImagePath = Storage::put('/images', $data['preview_image']);
//    $mainImagePath = Storage::put('/images', $data['main_image']);
//    $data['preview_image'] = $previewImagePath;
//    $data['main_image'] = $mainImagePath;
//    unset($data['preview_image']);
//    unset($data['main_image']);
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

//    $previewImagePath = Storage::put('/images', $data['preview_image']);
//    $mainImagePath = Storage::put('/images', $data['main_image']);
//    $data['preview_image'] = $previewImagePath;
//    $data['main_image'] = $mainImagePath;
//    unset($data['preview_image']);
//    unset($data['main_image']);
            $post->update($data);

            if (isset($tagIds)) {
                $post->tags()->sync($tagIds);
            }

            DB::commit();
            return $post;
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }

    }
}
