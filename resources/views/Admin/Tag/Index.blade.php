@extends('Admin.layouts.theme')
@section('main')
    <div>
        Теги
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
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td>{{$tag->created_at}}</td>
                    <td><a href=" {{route('admin.tag.show',$tag->id)}}">Показать</a></td>
                    <td><a href="{{route('admin.tag.edit',$tag->id)}}">Изменить</a></td>
                    <td>
                        <form method="POST" action="{{route('admin.tag.destroy',$tag->id)}}">
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
        <a href="{{route('admin.tag.create')}}">Добавления тегов</a>
    </div>
@endsection
