@extends('Admin.layouts.theme')
@section('main')
    <div>
        Категории
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
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td>{{$category->created_at}}</td>
                    <td><a href=" {{route('admin.category.show',$category->id)}}">Показать</a></td>
                    <td><a href="{{route('admin.category.edit',$category->id)}}">Изменить</a></td>
                    <td>
                        <form method="POST" action="{{route('admin.category.destroy',$category->id)}}">
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
        <a href="{{route('admin.category.create')}}">Добавления категории</a>
    </div>
@endsection
