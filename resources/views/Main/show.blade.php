@extends('layouts.theme')
@section('main')

    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{$post->title}}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">{{$date->day}} {{$date->translatedFormat('F')}} {{$date->year}} {{$date->format('H:i')}} Коментариев: {{$post->comments->count()}}</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{asset('storage/'. $post->main_image)}}" alt="featured image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto" data-aos="fade-up">
                        <p>{!! $post->content !!}</p>

                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-4 mb-3" data-aos="fade-right">
                        <img src="assets/images/blog_post_1.jpg" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-up">
                        <img src="assets/images/blog_post_2.jpg" alt="blog post" class="img-fluid">
                    </div>
                    <div class="col-md-4 mb-3" data-aos="fade-left">
                        <img src="assets/images/blog_post_3.jpg" alt="blog post" class="img-fluid">
                    </div>
                </div>

            </section>
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Рекомендуемые посты</h2>
                        <div class="row">
                            @if(count($relatedPosts) > 0)
                                @foreach($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="assets/images/blog_post_related_1.png" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{$relatedPost->category->title}}</p>
                                <h5 class="post-title">{{$relatedPost->title}}</h5>
                            </div>

                                @endforeach
                            @endif
                        </div>
                    </section>
                    <section class="comment-section mx-auto" style="margin-top: 100px">
                        <div>
                        <h2 class="section-title mb-5" data-aos="fade-up">Поделись свои мнением</h2>
                        </div>
                            <form action="{{route('post.comment.store', $post->id)}}" method="post">
                                @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Комментарий</label>
                                    <textarea name="comment" id="comment" class="form-control" placeholder="Comment" rows="10">Комментарий</textarea>
                                </div>
                                <input type = "hidden" name="post_id" value="{{$post->id}}">
                            </div>

                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Оставить комментарий" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
