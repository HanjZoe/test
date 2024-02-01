@extends('Admin.layouts.theme')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Добавления пользователя</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("admin.main.index")}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route("admin.user.index")}}">Пользователи</a></li>
                            <li class="breadcrumb-item active">Создание нового пользователя</li>
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
                    <div class="col-12">
                        <form action="{{route('admin.user.store')}}" method="POST" class="w-25">
                            @csrf
                            <label>Имя пользователя</label>
                            <div class="form-group" class="w-25">

                                <input type="text" placeholder="Имя пользователя" name="name" value="{{old('name')}}">
                                @error('name')
                                <div class="text-danger"> {{$message}}</div>
                                @enderror
                            </div>

                            <label>Адрес электронной почты</label>
                            <div class="form-group" class="w-25">

                                <input type="text" placeholder="Адрес электронной почты" name="email" value="{{old('email')}}">
                                @error('email')
                                <div>{{$message}}</div>
                                @enderror
                            </div>
                            <div class="form-group w-50">
                                <label>Выберите роль</label>
                                <select name="role" class="form-control">
                                    @foreach($roles as $id => $role)
                                        <option value="{{$id}}"
                                            {{$id == old('role_id') ?'selected' : ''}}
                                        >{{$role}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-primary" value="Добавить">
                        </form>
                    </div>

                </div><!-- /.container-fluid -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
