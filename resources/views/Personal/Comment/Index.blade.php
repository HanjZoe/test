@extends('Personal.layouts.theme')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Посты</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("personal.admin.index")}}">Главная</a></li>
                            <li class="breadcrumb-item active">Понравившиеся посты</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-6">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">Комментарий</th>
                                        <th class="text-center">Дата создания</th>
                                        <th colspan="2" class="text-center">Удалить/Изменить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>
                                            <td class="text-center">{{$comment->id}}</td>
                                            <td class="text-center">{{$comment->message}}</td>
                                            <td class="text-center">{{$comment->created_at}}</td>
                                            <td class="text-center"><a
                                                    href="{{route('personal.comment.edit',$comment->id)}}"
                                                    class="text-success"><i class="fas fa-pen"></i></a></td>
                                            <td class="text-center">
                                                <form method="POST"
                                                      action="{{route('personal.comment.destroy',$comment->id)}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="border-0 bg-transparent">
                                                        <i class="far fa-trash-alt text-danger" role="button"></i>
                                                    </button>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div>


                </div><!-- /.container-fluid -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
