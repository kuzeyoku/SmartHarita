<section class="services-section">
    <div class="auto-container">
        <div class="sec-title text-center">
            <span class="sub-title">@lang('front/service.txt1')</span>
            <h2>@lang('front/service.txt2')</h2>
        </div>
        <div class="row">
            @foreach ($service as $service)
                <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="inner-box">
                        <div class="icon-box"
                            style="background-image: url({{ $service->getFirstMediaUrl('cover') }})"></div>
                        <h5 class="title">
                            <a href="{{ $service->url }}">{{ $service->title }}</a>
                        </h5>
                        <div class="text">{{ $service->short_description }}</div>
                        <a href="{{ $service->url }}" class="read-more"><i>@svg('fas-long-arrow-alt-right', 'text-dark')</i>@lang('front/service.txt3')</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="bottom-box">
            <div class="text">@lang('front/service.txt4')</div>
            <a href="{{ route('service.index') }}" class="theme-btn btn-style-one">
                <span class="btn-title">@lang('front/service.txt5')</span>
            </a>
        </div>
    </div>
</section>
