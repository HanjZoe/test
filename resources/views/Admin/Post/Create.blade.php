@extends('Admin.layouts.theme')
@section('main')
    Добавления поста
    <form action="{{route('admin.post.store')}}" method="POST">
        @csrf
        <label>Название</label>
        <input type="text" placeholder="Название поста" name="title">
        @error('title')
        <div> Название должно быть</div>
        @enderror
        <div>

            <textarea id="summernote" name="content"></textarea>

        </div>
        @error('content')
        <div> Контент должен быть</div>
        @enderror
        <div>
            <label>Выберите категорию</label>
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}"
                        {{$category->id == old('$category->id') ?'selected' : ''}}
                    >{{$category->title}}</option>
                @endforeach
            </select>


        </div>
        <div>
            <label>Тэги</label>

            <select name="tag_ids[]" multiple>
                @foreach($tags as $tag)
                    <option {{is_array( old('tag_ids')) && in_array($tag->id,old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="submit" value="Добавить">
        </div>
    </form>
@endsection
