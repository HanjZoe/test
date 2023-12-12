@extends('Admin.layouts.theme')
@section('main')
    Добавления пользователя
    <form action="{{route('admin.user.update', $user->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <label>Редакстирование категории</label>
        <input type="text" placeholder="Имя пользователя" name="name" value="{{$user->name}}">
        @error('name')
        <div> {{$message}}</div>
        @enderror
        <input type="text" placeholder="Адресс электронной почты" name="email" value="{{$user->email}}">
        @error('email')
        <div>{{$message}}</div>
        @enderror
        <div>
            <label>Выберите категорию</label>
            <select name="role">
                @foreach($roles as $id => $role)
                    <option value="{{$id}}"
                        {{$id == $role ?'selected' : ''}}
                    >{{$role}}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="hidden" name = "user_id" value="{{$user->id}}">
            </div>
        <input type="submit" value="Обновить">
    </form>
@endsection
