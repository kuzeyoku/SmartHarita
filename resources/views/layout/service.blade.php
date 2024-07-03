<div class="rts-service-area rts-section-gapBottom">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="rts-title-area service text-center">
                    <p class="pre-title">
                        Our Services
                    </p>
                    <h2 class="title">High Quality Services</h2>
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
                                <a class="btn-red-more" href="{{ $service->url }}">@lang("front/service.txt3")<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="cta-one-bg col-12">
                <div class="cta-one-inner">
                    <div class="cta-left">
                        <h3 class="title">Hizmetlerimiz hakkında detaylı bilgi ve teklif almak için iletişime geçin.
                        </h3>
                    </div>
                    <div class="cta-right">
                        <a class='rts-btn btn-white' href='{{ route('contact.index') }}'>Hızlı Teklif Al</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
