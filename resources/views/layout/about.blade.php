<div class="rts-about-area rts-section-gap bg-about-sm-shape">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div
                class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-1 order-md-2 order-sm-2 order-2 mt_md--50 mt_sm--50">
                <div data-title="@lang('front/about.txt2')" class="rts-title-area">
                    <p class="pre-title">
                        @lang('front/about.txt1')
                    </p>
                    <h2 class="title">@lang('front/about.txt2')</h2>
                </div>
                <div class="about-inner">
                    <p class="disc">@lang('front/about.txt3')</p>
                    <div class="row about-success-wrapper">
                        @foreach (explode(',', __('front/about.txt4')) as $text)
                            <div class="col-lg-6 col-md-6">
                                <div class="single">
                                    <i class="far fa-check"></i>
                                    <p class="details">{{ $text }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row about-founder-wrapper align-items-center mt--40">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_sm--20">
                            <div class="author-call-option">
                                <img class="authore-call" src="{{ themeAsset('front', 'images/about/call.svg') }}"
                                    alt="call-svg">
                                <div class="call-details">
                                    <span>@lang('front/about.txt7')</span>
                                    <a href="tel:{{ settings('contact.phone') }}">
                                        <h6 class="title">{{ settings('contact.phone') }}</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                            @if (settings('general.video'))
                                <div class="vedio-icone">
                                    <a id="play-video" class="video-play-button" href="{{ settings('general.video') }}">
                                        <span></span>
                                        <span class="outer-text">@lang("front/about.txt5")</span>
                                    </a>
                                    <div id="video-overlay" class="video-overlay">
                                        <a class="video-overlay-close">×</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-md-1 order-sm-1 order-1">
                <div class="about-one-thumbnail">
                    <img src="{{ $themeAsset->about2 }}" alt="about-2">
                    <img class="small-img" src="{{ $themeAsset->about3 }}" alt="about-3">
                    <div class="experience">
                        <div class="left single">
                            <h2 class="title">@lang('front/about.txt8')</h2>
                            <p class="time">@lang('front/about.txt9')</p>
                        </div>
                        <div class="right single">
                            <p class="disc">
                                @lang('front/about.txt10')
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
