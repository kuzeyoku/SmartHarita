@extends('layout.main')
@section('title', $project->title)
@section('description', $project->short_description)
@section('ogimage', $project->getFirstMediaUrl('cover'))
@section('parent_url', route('project.index'))
@section('parent_title', __('front/project.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="project-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__top">
                        <div class="project-details__img">
                            {{ $project->getFirstMedia('cover') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-details__content">
                <div class="row mb-4">
                    <div class="col-xl-8 col-lg-8">
                        <div class="project-details__content-left">
                            <h3 class="mb-4">{{ $project->title }}</h3>
                            {!! $project->description !!}
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <div class="project-details__content-right">
                            <div class="project-details__details-box">
                                <div class="project-details__bg-shape"> </div>
                                <ul class="list-unstyled project-details__details-list">
                                    @foreach ($project->feature as $key => $value)
                                        <li>
                                            <p class="project-details__client">{{ $key }}</p>
                                            <h4 class="project-details__name">{{ $value }}</h4>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <iframe title="{{ $project->title }}" width="100%" height="600" src="{{ $project->model3D }}"
                    frameborder="0" allow="fullscreen" allowfullscreen="true" mozallowfullscreen="true"
                    webkitallowfullscreen="true"></iframe>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="project-details__pagination-box">
                        <ul class="project-details__pagination list-unstyled clearfix">
                            @if ($project->previous)
                                <li class="previous">
                                    <div class="content">{{ $project->previous->title }}</div>
                                    <div class="icon">
                                        <a href="{{ $project->previous->url }}" aria-label="Previous">
                                            <i>@svg('fas-arrow-right')</i>
                                        </a>
                                    </div>
                                </li>
                            @endif
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            <li class="count"><a href="#"></a></li>
                            @if ($project->next)
                                <li class="next">
                                    <div class="icon">
                                        <a href="{{ $project->next->url }}" aria-label="next">
                                            <i>@svg('fas-arrow-left')</i>
                                        </a>
                                    </div>
                                    <div class="content">{{ $project->next->title }}</div>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if ($otherProjects->isNotEmpty())
        <section class="projects-section-two pt-0">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <span class="sub-title">@lang('front/project.txt1')</span>
                    <h2>@lang('front/project.txt3')</h2>
                </div>
                <div class="carousel-outer">
                    <div class="projects-carousel owl-carousel owl-theme">
                        @foreach ($otherProjects as $item)
                            <div class="project-block">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ $item->url }}">
                                                <img src="{{ $item->getFirstMediaUrl('cover') }}"
                                                    alt="{{ $item->title }}">
                                            </a>
                                        </figure>
                                        <div class="info-box">
                                            <a href="{{ $item->url }}" class="read-more">
                                                @svg('fas-long-arrow-alt-right', 'text-white')
                                            </a>
                                            <h6 class="title">
                                                <a href="{{ $item->url }}">{{ $item->title }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection
