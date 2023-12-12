@extends('Admin.layouts.theme')
@section('main')
    <div>
        Категория {{$category->title}} <a href="{{route('admin.category.edit',$category->id)}}">Изменить</a>

        <form method="POST" action="{{route('admin.category.destroy',$category->id)}}">
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
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->created_at}}</td>

                </tr>
            </tbody>
        </table>
    </div>
@endsection
