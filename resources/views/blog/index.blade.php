@extends('layout.main')
@section('title', __('front/blog.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="bg-silver-light">
        <div class="container pb-90">
            <div class="row">
                @foreach ($posts as $post)
                    <div class="news-block col-xl-4 col-lg-6 col-md-6">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image">
                                    <a href="{{ $post->url }}">{{ $post->getFirstMedia('cover') }}</a>
                                </figure>
                            </div>
                            <div class="content-box border">
                                <span class="date">{{ $post->created_at->translatedFormat('d M Y') }}</span>
                                <span class="post-info">@svg('fas-user-circle', 'icon-space'){{ $post->user->name }}</span>
                                <h5 class="title"><a href="{{ $post->url }}">{{ $post->title }}</a></h5>
                                <div class="text">{{ $post->short_description }}</div>
                                <a href="{{ $post->url }}" class="read-more"><i>@svg('fas-long-arrow-alt-right')</i>
                                    @lang('front/blog.txt3')</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {!! $posts->onEachSide(1)->links('blog.pagination') !!}
        </div>
    </section>
@endsection
