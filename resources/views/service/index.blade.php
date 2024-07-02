@extends('layout.main')
@section('title', __('front/service.txt2'))
@section('content')
    @include('layout.breadcrumb')
    <section class="">
        <div class="container pb-90">
            <div class="row">
                @foreach ($service as $service)
                    <div class="service-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-box">
                            <div class="icon-box" style="background-image: url({{ $service->getFirstMediaUrl('cover') }})">
                            </div>
                            <h5 class="title">
                                <a href="{{ $service->url }}">{{ $service->title }}</a>
                            </h5>
                            <div class="text">{{ $service->short_description }}</div>
                            <a href="{{ $service->url }}" class="read-more"><i>@svg('fas-long-arrow-alt-right')</i>@lang('front/service.txt3')</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
