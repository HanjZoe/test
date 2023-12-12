@extends('Admin.layouts.theme')
@section('main')
    Добавления категорий
    <form action="{{route('admin.category.store')}}" method="POST">
        @csrf
        <label>Название</label>
        <input type="text" placeholder="Название категории" name="title">
        @error('title')
        <div> Название должно быть</div>
        @enderror
        <input type="submit" value="Добавить">
    </form>
@endsection
