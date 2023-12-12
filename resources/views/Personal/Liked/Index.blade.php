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
                @foreach($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->created_at}}</td>
                        <td><a href=" {{route('admin.post.show',$post->id)}}">Показать</a></td>
                        <td>
                            <form method="POST" action="{{route('personal.liked.destroy',$post->id)}}">
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
