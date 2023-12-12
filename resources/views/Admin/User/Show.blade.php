@extends('Admin.layouts.theme')
@section('main')
    <div>
        Юзер {{$user->name}} <a href="{{route('admin.user.edit',$user->id)}}">Изменить</a>

        <form method="POST" action="{{route('admin.user.destroy',$user->id)}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Удалить">
        </form>

    </div>
    <div>
        <table>
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Дата создания</th>

            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->created_at}}</td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
