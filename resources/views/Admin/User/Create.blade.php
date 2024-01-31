@extends('Admin.layouts.theme')
@section('main')
    Добавления категорий
    <form action="{{route('admin.user.store')}}" method="POST">
        @csrf
        <label>Название</label>
        <input type="text" placeholder="Имя пользователя" name="name">
        @error('name')
        <div>{{$message}}</div>
        @enderror
        <input type="text" placeholder="Адресс электронной почты" name="email">
        @error('email')
        <div>{{$message}}</div>
        @enderror
        <div>
            <label>Выберите категорию</label>
            <select name="role">
                @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                        {{$id == old('role_id') ?'selected' : ''}}
                    >{{$role}}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Добавить">
    </form>
@endsection
