@extends('Admin.layouts.theme')
@section('content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Пользователи</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("admin.main.index")}}">Главная</a></li>
                            <li class="breadcrumb-item active">Пользователи</li>
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
                        <a href="{{route('admin.user.create')}}" type="button" class="btn btn-block btn-primary">Добавить</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="card">

                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="text-center">id</th>
                                        <th class="text-center">Название</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Дата создания</th>
                                        <th colspan="3" class="text-center">Удалить/Изменить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="text-center">{{$user->id}}</td>
                                            <td class="text-center">{{$user->name}}</td>
                                            <td class="text-center">{{$user->email}}</td>
                                            <td class="text-center">{{$user->created_at}}</td>
                                            <td class="text-center"><a
                                                    href=" {{route('admin.user.show',$user->id)}}"><i
                                                        class="fas fa-eye"></i></a></td>
                                            <td class="text-center"><a
                                                    href="{{route('admin.user.edit',$user->id)}}"
                                                    class="text-success"><i class="fas fa-pen"></i></a></td>
                                            <td class="text-center">
                                                <form method="POST"
                                                      action="{{route('admin.user.destroy',$user->id)}}">
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

