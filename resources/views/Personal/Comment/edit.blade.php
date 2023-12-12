@extends('Personal.layouts.theme')
@section('main')
    Добавления категорий
    <form action="{{route('personal.comment.update', $comment->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <label>Редакстирование категории</label>
       <textarea name = "message">{{$comment->message}}</textarea>
        @error('message')
        <div>Должен быть текст</div>
        @enderror
        <input type="submit" value="Обновить">
    </form>
@endsection
