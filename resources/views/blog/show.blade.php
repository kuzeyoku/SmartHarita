@extends('layout.main')
@section('title', $post->title)
@section('parent_url', route('blog.index'))
@section('parent_title', __('front/blog.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <div class="blog-single-post-listing details mb--0">
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
                            <h3 class="title">{{ $post->title }}</h3>
                            <p class="disc">
                                {!! $post->description !!}
                            </p>
                            <div class="author-area">
                                <div class="align-items-center">
                                    <div class="details-tag">
                                        <h6>@lang('front/blog.txt5')</h6>
                                        @foreach ($post->tagsToArray as $tag)
                                            <button>{{ $tag }}</button>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="replay-area-details">
                                <h4 class="title">@lang('front/blog.txt6')</h4>
                                {{ html()->form()->route('blog.comment_store', $post)->open() }}
                                <div class="row g-4">
                                    <div class="col-lg-6">
                                        {{ html()->text('name')->placeholder(__('front/blog.txt7')) }}
                                    </div>
                                    <div class="col-lg-6">
                                        {{ html()->email('email')->placeholder(__('front/blog.txt8')) }}
                                    </div>
                                </div>
                                {{ html()->textarea('comment')->placeholder(__('front/blog.txt9'))->rows(5)->class('form-control mb-5') }}
                                {{ html()->submit(__('front/blog.txt10'))->class('rts-btn btn-primary g-recaptcha')->attributes([
                                        'data-sitekey' => config('setting.recaptcha.site_key'),
                                        'data-callback' => 'comment-form',
                                        'data-action' => 'submit',
                                    ]) }}
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12">
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
                                        <li><a href="{{ $category->url }}">{{ $category->title }}<i
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
