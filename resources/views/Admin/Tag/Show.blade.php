@extends('Admin.layouts.theme')
@section('main')
    <div>
        Категория {{$tag->title}} <a href="{{route('admin.tag.edit',$tag->id)}}">Изменить</a>

        <form method="POST" action="{{route('admin.tag.destroy',$tag->id)}}">
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
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td>{{$tag->created_at}}</td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
