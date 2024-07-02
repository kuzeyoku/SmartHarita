@extends('layout.main')
@section('title', $service->title)
@section('description', $service->short_description)
@section('ogimage', $service->getFirstMediaUrl('cover'))
@section('parent_url', route('service.index'))
@section('parent_title', __('front/service.txt2'))
@section('content')
    @include('layout.breadcrumb')
    <section class="services-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="service-sidebar">
                        <div class="sidebar-widget service-sidebar-single">
                            @if ($otherServices->isNotEmpty())
                                <div class="sidebar-service-list">
                                    <ul>
                                        @foreach ($otherServices as $item)
                                            <li>
                                                <a href="{{ $item->url }}" class="current">@svg('fas-angle-right')
                                                    <span>{{ $item->title }}</span>
                                                </a>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endif
                            <div class="service-details-help">
                                <div class="help-shape-1"></div>
                                <div class="help-shape-2"></div>
                                <h4 class="help-title">@lang('front/service.txt6')</h4>
                                <div class="help-icon">
                                    @svg('fas-phone-alt')
                                </div>
                                <div class="help-contact">
                                    <p>@lang('front/service.txt7')</p>
                                    <a
                                        href="tel:{{ config('setting.contact.phone') }}">{{ config('setting.contact.phone') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="services-details__content">
                        {{ $service->getFirstMedia('cover') }}
                        <h3 class="mt-4">{{ $service->title }}</h3>
                        {!! $service->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
