@extends('layout.main')
@section('title', __('front/blog.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    @foreach ($posts as $post)
                        <div class="blog-single-post-listing">
                            <div class="thumbnail">
                                <img src="{{ $post->getFirstMediaUrl('cover') }}" alt="{{ $post->title }}">
                            </div>
                            <div class="blog-listing-content">
                                <div class="user-info">
                                    <div class="single">
                                        <i class="far fa-user-circle"></i>
                                        <span>{{ $post->user->name }}</span>
                                    </div>
                                    <div class="single">
                                        <i class="far fa-clock"></i>
                                        <span>{{ $post->created_at->translatedFormat('d M Y') }}</span>
                                    </div>
                                    <div class="single">
                                        <i class="far fa-tags"></i>
                                        <span>{{ $post->category_title ?? __('front/general.uncategorized') }}</span>
                                    </div>
                                </div>
                                <a class='blog-title' href='{{ $post->url }}'>
                                    <h3 class="title">{{ $post->title }}</h3>
                                </a>
                                <p class="disc">
                                    {{ $post->short_description }}
                                </p>
                                <a class='rts-btn btn-primary' href='{{ $post->url }}'>@lang('front/blog.txt3')</a>
                            </div>
                        </div>
                    @endforeach

                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                {!! $posts->onEachSide(1)->links('blog.pagination') !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt_lg--60">
                    @if ($categories->isNotEmpty())
                        <div class="rts-single-wized Categories">
                            <div class="wized-header">
                                <h5 class="title">
                                    @lang('front/blog.txt13')
                                </h5>
                            </div>
                            <div class="wized-body">
                                @foreach ($categories as $category)
                                    <ul class="single-categories">
                                        <li><a href="{{ $category->url }}">{{ $category->title }} <i
                                                    class="far fa-long-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                @lang('front/blog.txt12')
                            </h5>
                        </div>
                        <div class="wized-body">
                            @foreach ($popularPost as $post)
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a href="{{ $post->url }}"><img src="{{ $post->getFirstMediaUrl('cover') }}"
                                                alt="{{ $post->title }}"></a>
                                    </div>
                                    <div class="content-area">
                                        <div class="user">
                                            <i class="fal fa-clock"></i>
                                            <span>{{ $post->created_at->translatedFormat('d M Y') }}</span>
                                        </div>
                                        <a class="post-title" href="{{ $post->url }}">
                                            <h6 class="title">{{ $post->title }}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
