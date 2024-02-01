@extends('Personal.layouts.theme')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Редактирование комментария</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{route("personal.admin.index")}}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{route("personal.comment.index")}}">Комментарии</a></li>
                            <li class="breadcrumb-item active">Редактирование комментария</li>
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
                        <form action="{{route('personal.comment.update', $comment->id)}}" method="POST" class="w-50">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                              <textarea name="message" cols="30" rows="10" placeholder="Комментарий">{{$comment->message}}</textarea>
                                @error('message')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>

                            <input type="submit" class="btn btn-primary" value="Обновить">
                        </form>
                    </div>

                </div><!-- /.container-fluid -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
