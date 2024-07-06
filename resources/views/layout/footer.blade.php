<div class="rts-footer-area footer-three footer-four rts-section-gapTop footer-bg-2">
    <div class="container pb--100 pb_sm--40">
        <div class="row g-5">
            <div class="col-xl-3 col-lg-6">
                <div class="footer-three-single-wized left">
                    <a href="{{ route('home') }}" class="logo_footer">
                        <img src="{{ $themeAsset->logo_light }}" alt="{{ settings('general.title') }}">
                    </a>
                    <p class="disc">{{ settings('general.description') }}</p>
                    <ul class="social-three-wrapper">
                        @foreach (settings('social.platforms') as $platform)
                            <li><a href="{{ settings('social.' . $platform) }}"><i
                                        class="fab fa-{{ settings('social.' . $platform) }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="footer-one-single-wized">
                    <div class="wized-title">
                        <h5 class="title">@lang('front/footer.txt5')</h5>
                        <img src="{{ themeAsset('front', 'images/footer/under-title.png') }}" alt="finbiz_footer">
                    </div>
                    <div class="quick-link-inner">
                        <ul class="links">
                            @foreach ($quickLinks as $link)
                                <li><a href="{{ $link->url }}"><i class="far fa-arrow-right"></i>
                                        {{ $link->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="footer-one-single-wized">
                    <div class="wized-title">
                        <h5 class="title">@lang('front/footer.txt6')</h5>
                        <img src="{{ themeAsset('front', 'images/footer/under-title.png') }}" alt="finbiz_footer">
                    </div>
                    <div class="quick-link-inner">
                        <ul class="links">
                            @foreach ($footer_services as $service)
                                <li><a href="{{ $service->url }}"><i class="far fa-arrow-right"></i>
                                        {{ $service->title }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3">
                <div class="footer-three-single-wized mid-left">
                    <h5 class="title">@lang('front/footer.txt1')</h5>
                    <div class="body">
                        <div class="info-wrapper">
                            <div class="single">
                                <ul class="icon">
                                    <li><i class="fas fa-phone-alt"></i></li>
                                </ul>
                                <div class="info">
                                    <span>@lang('front/footer.txt2')</span>
                                    <a href="tel:{{ settings('contact.phone') }}">{{ settings('contact.phone') }}</a>
                                </div>
                            </div>
                            <div class="single">
                                <ul class="icon">
                                    <li><i class="far fa-envelope"></i></li>
                                </ul>
                                <div class="info">
                                    <span>@lang('front/footer.txt3')</span>
                                    <a href="mailto:{{ settings('contact.email') }}">{{ settings('contact.email') }}</a>
                                </div>
                            </div>
                            <div class="single">
                                <ul class="icon">
                                    <li><i class="fas fa-map-marker-alt"></i></li>
                                </ul>
                                <div class="info">
                                    <span>@lang('front/footer.txt4')</span>
                                    <a href="#">{{ settings('contact.address') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <p class="disc text-center ptb--25">
                @lang('front/footer.txt7', ['year' => date('Y'), 'title' => settings('general.title'), 'author' => env('APP_NAME'), 'url' => env('APP_URL')])
            </p>
        </div>
    </div>
</div>
<div class="loader-wrapper">
    <div class="loader">
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
