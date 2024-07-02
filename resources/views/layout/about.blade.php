<section class="why-choose-us">
    <div class="bg bg-pattern-13"></div>
    <div class="auto-container">
        <div class="row">
            <div class="content-column col-xl-6 col-lg-7 col-md-12 col-sm-12 order-2 wow fadeInRight"
                data-wow-delay="600ms">
                <div class="inner-column">
                    <div class="sec-title">
                        <span class="sub-title">@lang('front/about.txt1')</span>
                        <h1>@lang('front/about.txt2')</h1>
                        <div class="text">@lang('front/about.txt3')</div>
                    </div>
                    <blockquote class="blockquote-one">@lang('front/about.txt4')</blockquote>
                    <div class="btn-box">
                        <a href="#"
                            class="play-now-two lightbox-image"><i>@svg('fas-play', 'text-white')</i>@lang('front/about.txt5')</a>
                        <a href="{{ isset($about) ? $about->url : '#' }}" class="theme-btn btn-style-one"><span
                                class="btn-title">@lang('front/about.txt6')</span></a>
                    </div>
                </div>
            </div>

            <div class="image-column col-xl-6 col-lg-5 col-md-12 col-sm-12">
                <div class="inner-column wow fadeInLeft">
                    <div class="image-box">
                        <span class="bg-shape"></span>
                        <figure class="image-1 overlay-anim wow fadeInUp"><img loading="lazy"
                                src="{{ $themeAsset->about1 }}" alt="drone"></figure>
                        <figure class="image-2 overlay-anim wow fadeInRight"><img loading="lazy"
                                src="{{ $themeAsset->about2 }}" alt="cartographer"></figure>
                        <figure class="image-3 overlay-anim wow fadeInRight"><img loading="lazy"
                                src="{{ $themeAsset->about3 }}" alt="mining"></figure>
                        <figure class="logo"><img src="{{ themeAsset('front', 'images/resource/fav-icon.png') }}">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
