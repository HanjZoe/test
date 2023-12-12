@extends('Admin.layouts.theme')
@section('main')
    <div>
        Пользователи
    </div>
    <div>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Дата создания</th>
                <th>Удалить/Изменить</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><a href=" {{route('admin.user.show',$user->id)}}">Показать</a></td>
                    <td><a href="{{route('admin.user.edit',$user->id)}}">Изменить</a></td>
                    <td>
                        <form method="POST" action="{{route('admin.user.destroy',$user->id)}}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <a href="{{route('admin.user.create')}}">Добавления пользователя</a>
    </div>
@endsection
