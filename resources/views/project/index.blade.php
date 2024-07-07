@extends('layout.main')
@section('title', __('front/project.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-project-area rts-section-gap">
        <div class="container">
            <div class="tab-content-area mt--50 mt_sm--30">
                <div class="row g-5">
                    @foreach ($projects as $project)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="rts-product-one">
                                <div class="thumbnail-area">
                                    <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="{{ $project->title }}">
                                    <a class='rts-btn btn-primary rounded' href='{{ $project->url }}'><i
                                            class="far fa-arrow-right"></i></a>
                                </div>
                                <div class="product-contact-wrapper">
                                    <span>{{ $project->category_title ?? __('front/general.uncategorized') }}</span>
                                    <a href='{{ $project->url }}'>
                                        <h5 class="title">{{ $project->title }}</h5>
                                    </a>
                                    <p class="disc">
                                        {{ $project->short_description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
