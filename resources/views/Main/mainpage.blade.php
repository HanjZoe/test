@extends('layouts.theme')
@section('main')

    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
            <section class="featured-posts-section">
                <div class="row">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <a href="{{route('post.show',$post->id)}}">
                                <div class="col-md-4 fetured-post blog-post" data-aos="fade-right">
                                    <div class="blog-post-thumbnail-wrapper">
                                        <img src="{{asset('/storage/' . $post->preview_image)}}" alt="blog post">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="blog-post-category">{{$post->category->title}}</p>
                                        @auth()
                                        <form action="{{route('post.like.store',$post->id)}}" method="post">
                                            @csrf
                                            <span>
                                        {{$post->liked_users_count}}
                                    </span>
                                            <button class=" border-0 bg-transparent" type="submit">


                                                    <i class="fa{{auth()->user()->likedPosts->contains($post->id) ? "s" : "r"}} fa-heart"></i>


                                            </button>
                                        </form>
                                        @endauth
                                        @guest()
                                            <span>
                                        {{$post->liked_users_count}}
                                    </span>
                                            <i class="far fa-heart"></i>
                                        @endguest
                                    </div>
                                    <a class="blog-post-permalink">
                                        <h6 class="blog-post-title">{{$post->title}}</h6>
                                    </a>
                                </div>
                            </a>
                        @endforeach
                    @else
                        <a class="blog-post-permalink">
                            <h5 class="blog-post-title">Нет постов</h5>
                        </a>
                    @endif

                    <div class="col-md-4 sidebar" data-aos="fade-left">
                        @if(@count($likedPosts) > 0)
                            <div class="widget widget-post-list">
                                <h5 class="widget-title">Случайные посты</h5>
                                <ul class="post-list">
                                    @foreach($likedPosts as $likedPost)
                                        <li class="post">
                                            <a href="{{route('post.show',$likedPost->id)}}"
                                               class="post-permalink media">
                                                <img src="{{asset('storage' . $likedPost->preview_image)}}"
                                                     alt="blog post">
                                                <div class="media-body">
                                                    <h6 class="post-title">{{$likedPost->title}}</h6>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="widget">
                            <h5 class="widget-title">Категории</h5>
                            @if(@count($categories) > 0)
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a class="widget-title" href="#">{{$category->title}}</a></li>
                                    @endforeach
                                </ul>
                            @else
                                <a>Нет категорий</a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="mx-auto" style="margin-top: -100px">
                            {{$posts->links()}}
                        </div>
                    </div>
                </div>
        </div>


    </main>
@endsection
