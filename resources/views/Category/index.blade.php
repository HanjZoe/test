@extends('layouts.theme')
@section('main')
    <main class="blog">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">Категория {{$category->name}}</h1>
            <section class="featured-posts-section">
                <div class="row mb-4">
                    @if(count($posts) > 0)
                        @foreach($posts as $post)
                            <div class="col-md-4 fetured-post blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{asset('/storage/' . $post->preview_image)}}" alt="blog post">
                                </div>
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
                                    <div>
                                            <span class=" border-0 bg-transparent">
                                        {{$post->liked_users_count}}
                                    </span>
                                        <i class="far fa-heart"></i>
                                    </div>
                                @endguest
                                <a href="{{route('post.show',$post->id)}}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{$post->category->title}}</h6>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <a class="blog-post-permalink">
                            <h5 class="blog-post-title">Нет постов</h5>
                        </a>
                    @endif
                </div>
                <div class="row">
                    <div class="mx-auto" style="margin-top: -100px">
                        {{$posts->links()}}
                    </div>
                </div>

            </section>

        </div>

    </main>
    <br>
    <br>
@endsection

