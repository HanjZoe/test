@extends('Admin.layouts.theme')
@section('main')
    <div>
        Категория {{$post->title}} <a href="{{route('admin.post.edit',$post->id)}}">Изменить</a>

        <form method="POST" action="{{route('admin.post.destroy',$post->id)}}">
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
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
