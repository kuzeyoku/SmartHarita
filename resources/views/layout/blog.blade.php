<div class="rts-blog-area rts-section-gap bg-secondary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="title-area text-center">
                    <span>@lang('front/blog.txt1')</span>
                    <h2 class="title">@lang('front/blog.txt2')</h2>
                </div>
            </div>
        </div>
        <div class="g-5 mt--20">
            <div class="swiper mySwiperh1_blog">
                <div class="swiper-wrapper">
                    @foreach ($blog as $post)
                        <div class="swiper-slide">
                            <div class="single-blog-one-wrapper">
                                <div class="thumbnail">
                                    <img src="{{ $post->getFirstMediaUrl('cover') }}" alt="{{ $post->title }}">
                                    <div class="blog-badge">
                                        <span>{{ $post->created_at->translatedFormat('d M Y') }}</span>
                                    </div>
                                </div>
                                <div class="blog-content">
                                    <p><span>{{ $post->category->title ?? __('front/general.uncategorized') }} </span>/
                                        {{ $post->user->name }}</p>
                                    <a href='{{ $post->url }}'>
                                        <h5 class="title">{{ $post->title }}</h5>
                                    </a>
                                    <a class='rts-read-more btn-primary' href='{{ $post->url }}'><i
                                            class="far fa-arrow-right"></i>@lang('front/blog.txt3')</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
