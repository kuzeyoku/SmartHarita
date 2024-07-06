@extends('layout.main')
@section('title', __('front/service.txt2'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-service-area rts-section-gapTop pb--200 service-two-bg bg_image">
        <div class="container">
            <div class="row g-5 service padding-controler">
                @foreach ($service as $service)
                    <div class="col-xl-4 col-md-6 col-sm-12 col-12 pb--140 pb_md--100">
                        <div class="service-two-inner">
                            <a class='thumbnail' href='{{ $service->url }}'><img
                                    src="{{ $service->getFirstMediaUrl('cover') }}" alt="Business_image"></a>
                            <div class="body-content">
                                <div class="hidden-area">
                                    <h5 class="title">{{ $service->title }}</h5>
                                    <p class="dsic">
                                        {{ $service->short_description }}
                                    </p>
                                    <a class='rts-read-more-two color-primary'
                                        href='{{ $service->url }}'>@lang('front/service.txt3')<i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
