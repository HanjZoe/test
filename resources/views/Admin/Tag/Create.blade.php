@extends('Admin.layouts.theme')
@section('main')
    Добавления тега
    <form action="{{route('admin.tag.store')}}" method="POST">
        @csrf
        <label>Название</label>
        <input type="text" placeholder="Название тега" name="title">
        @error('title')
        <div> Название должно быть</div>
        @enderror

        <input type="submit" value="Добавить">
    </form>
@endsection
