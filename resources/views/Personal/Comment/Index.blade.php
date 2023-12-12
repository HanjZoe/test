@extends('Personal.layouts.theme')
@section('main')

    <div>
        Посты
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
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->message}}</td>
                    <td>{{$comment->created_at}}</td>
                    <td><a href=" {{route('personal.comment.edit',$comment->id)}}">Редактировать</a></td>
                    <td>
                        <form method="POST" action="{{route('personal.comment.destroy',$comment->id)}}">
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

@endsection
