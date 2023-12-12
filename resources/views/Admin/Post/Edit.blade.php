@extends('Admin.layouts.theme')
@section('main')
    Добавления категорий
    <form action="{{route('admin.post.update', $post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <label>Редакстирование категории</label>
        <input type="text" placeholder="Название категории" name="title" value="{{$post->title}}">
        @error('title')
        <div> Название должно быть</div>
        @enderror
        <div>

            <textarea id="summernote" name="content">{{$post->content}}</textarea>

        </div>
        @error('content')
        <div> Контент должен быть</div>
        @enderror
        <div>
            <label>Выберите категорию</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                        {{$category->id == $post->category_id ?'selected' : ''}}
                    >{{$category->title}}</option>
                @endforeach
            </select>


        </div>
        <div>
            <label>Тэги</label>

            <select name="tag_ids[]" multiple>
                @foreach($tags as $tag)
                    <option {{is_array( $post->tags->pluck('id')->toArray()) && in_array($tag->id,$post->tags->pluck('id')->toArray()) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Обновить">
    </form>
@endsection
