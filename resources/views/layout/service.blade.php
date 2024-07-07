<div class="rts-service-area rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div data-title="@lang('front/service.txt2')" class="rts-title-area service text-center">
                    <p class="pre-title">
                        @lang('front/service.txt1')
                    </p>
                    <h2 class="title">@lang('front/service.txt2')</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid service-main plr--120-service mt--50 plr_md--0 pl_sm--0 pr_sm--0">
        <div class="background-service">
            <div class="row g-5 mt--10">
                @foreach ($service as $service)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="rts-single-service-h2">
                            <a class="thumbnail" href="{{ $service->url }}">
                                <img src="{{ $service->getFirstMediaUrl('cover') }}" alt="{{ $service->title }}">
                            </a>
                            <div class="body">
                                <a href="{{ $service->url }}">
                                    <h5 class="title">{{ $service->title }}</h5>
                                </a>
                                <p class="disc">
                                    {{ $service->short_description }}
                                </p>
                                <a class="btn-red-more" href="{{ $service->url }}">@lang('front/service.txt3')<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="cta-one-bg col-12" style="background-image: url({{ $themeAsset->cta }})">
                <div class="cta-one-inner">
                    <div class="cta-left">
                        <h3 class="title">@lang('front/service.txt4')
                        </h3>
                    </div>
                    <div class="cta-right">
                        <a class='rts-btn btn-white' href='{{ route('contact.index') }}'>@lang('front/service.txt5')</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
