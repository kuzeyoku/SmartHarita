<section class="news-section">
    <div class="bg bg-pattern-19"></div>
    <div class="auto-container">
        <div class="sec-title text-center light">
            <span class="sub-title">@lang('front/blog.txt1')</span>
            <h2>@lang('front/blog.txt2')</h2>
        </div>
        <div class="row">
            @foreach ($blog as $post)
                <div class="news-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ $post->url }}">
                                    <img loading="lazy" src="{{ $post->getFirstMediaUrl('cover') }}"
                                        alt="{{ $post->title }}">
                                </a>
                            </figure>
                        </div>
                        <div class="content-box border">
                            <span class="date">{{ $post->created_at->translatedFormat('d M, Y') }}</span>
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
    </div>
</section>
