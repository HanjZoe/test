@extends('Admin.layouts.theme')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 d-flex align-items-center">
                        <h1 class="m-0 mr-2"> Тэг {{$tag->title}}</h1>
                        <a href="{{route('admin.tag.edit',$tag->id)}}" class="text-success"><i
                                class="fas fa-pen"></i></a>
                        <form method="POST"
                              action="{{route('admin.tag.destroy',$tag->id)}}">
                            @csrf
                            @method('DELETE')
                            <button class="border-0 bg-transparent">
                                <i class="far fa-trash-alt text-danger" role="button"></i>
                            </button>

                        </form>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("admin.main.index")}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route("admin.tag.index")}}">Тэги</a></li>
                            <li class="breadcrumb-item active">Тэг {{$tag->title}}</li>
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
                    <div class="col-1 mb-3">

                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
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
