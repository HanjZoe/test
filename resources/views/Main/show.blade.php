@extends('layouts.theme')
@section('main')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up"
               data-aos-delay="200">{{$date->day}} {{$date->translatedFormat('F')}} {{$date->year}} {{$date->format('H:i')}}
                Коментариев: {{$post->comments->count()}}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'. $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $post->content !!}</p>

                    </div>
                </div>


            </section>
            <section>
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
            </section>
            @if(count($relatedPosts) > 0)
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        <section class="related-posts">
                            <h2 class="section-title mb-4" data-aos="fade-up">Рекомендуемые посты</h2>
                            <div class="row">

                                @foreach($relatedPosts as $relatedPost)
                                    <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                        <a href="{{route('post.show',$relatedPost->id)}}">
                                        <img src="{{asset('/storage/' . $relatedPost->preview_image)}}" alt="related post"
                                             class="post-thumbnail">
                                        <p class="post-category">{{$relatedPost->category->title}}</p>
                                        <h5 class="post-title">{{$relatedPost->title}}</h5>
                                            </a>
                                    </div>

                                @endforeach

                            </div>
                            @endif

                        </section>



                        <section class="comment-section mx-auto" style="margin-top: 100px">
                            <div>
                                <h2 class="section-title mb-5" data-aos="fade-up">Поделись свои мнением
                                    ({{$post->comments->count()}})</h2>
                            </div>
                            @if(count($post->comments) > 0)
                                <section class="comment-list mb-5">
                                    @foreach($post->comments as $comment)
                                        <div class="comment-text mb-3">
                    <span class="username">
                        <div>
                      {{$comment->user->name}}
                        </div>
                      <span class="text-muted float-right">{{$comment->DateAsCarbon->diffForHumans()}}</span>
                    </span>{{$comment->message}}
                                        </div>
                                    @endforeach
                                </section>
                            @else
                                Нет комментариев
                            @endif
                            @auth()
                                <form action="{{route('post.comment.store', $post->id)}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-12" data-aos="fade-up">
                                            <label for="comment" class="sr-only">Комментарий</label>
                                            <textarea name="message" id="comment" class="form-control"
                                                      placeholder="Комментарий"
                                                      rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12" data-aos="fade-up">
                                            <input type="submit" value="Оставить комментарий" class="btn btn-warning">
                                        </div>
                                    </div>
                                </form>
                            @endauth
                        </section>
                    </div>
                </div>
        </div>
    </main>
@endsection
