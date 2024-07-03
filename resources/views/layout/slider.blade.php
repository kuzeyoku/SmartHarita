<div class="rts-banner-area-two">
    <div class="swiper mySwiperh2_banner">
        <div class="swiper-wrapper">
            @foreach ($slider as $slider)
                <div class="swiper-slide">
                    <div class="banner-two" style="background-image: url({{ $slider->getFirstMediaUrl('cover') }})">
                        <div class="container">
                            <div class="banner-two-content text-center">
                                <div class="wrapper">
                                    <h1 class="title">
                                        {{ $slider->title }}
                                    </h1>
                                    <span class="sub">{{ $slider->description }}</span>

                                    @if ($slider->button)
                                        <a class="rts-btn" href="{{ $slider->button }}">@lang('front/slider.txt1')</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
