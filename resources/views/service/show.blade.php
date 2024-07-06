@extends('layout.main')
@section('title', $service->title)
@section('parent_title', __('front/service.txt2'))
@section('parent_url', route('service.index'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-service-details-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <div class="service-detials-step-1">
                        <div class="thumbnail">
                            <img src="{{ $service->getFirstMediaUrl('cover') }}" alt="{{ $service->title }}">
                        </div>
                        <h4 class="title">{{ $service->title }}</h4>
                        <p class="disc">
                            {!! $service->description !!}
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt_lg--60 pl--50 pl_md--0 pl-lg-controler pl_sm--0">
                    <div class="rts-single-wized Categories service">
                        <div class="wized-header">
                            <h5 class="title">
                                @lang('front/service.txt6')
                            </h5>
                        </div>
                        <div class="wized-body">
                            @foreach ($otherServices as $item)
                                <ul class="single-categories">
                                    <li>
                                        <a href="{{ $item->url }}">
                                            {{ $item->title }} <i class="far fa-long-arrow-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="rts-single-wized contact service">
                        <div class="wized-body">
                            <h5 class="title">@lang('front/service.txt4')</h5>
                            <a class="rts-btn btn-primary" href="{{ route('contact.index') }}">@lang('front/service.txt5')</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
