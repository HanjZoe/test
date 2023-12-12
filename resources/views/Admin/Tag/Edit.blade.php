@extends('Admin.layouts.theme')
@section('main')
    Добавления категорий
    <form action="{{route('admin.tag.update', $tag->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <label>Редакстирование категории</label>
        <input type="text" placeholder="Название категории" name="title" value="{{$tag->title}}">
        @error('title')
        <div> Название должно быть</div>
        @enderror
        <input type="submit" value="Обновить">
    </form>
@endsection
