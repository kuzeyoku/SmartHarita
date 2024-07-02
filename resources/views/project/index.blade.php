@extends('layout.main')
@section('title', __('front/project.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="">
        <div class="container">
            <div class="row g-3">
                @foreach ($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="project-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('project.show', [$project->id, $project->slug]) }}">
                                            <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="">
                                        </a>
                                    </figure>
                                    <div class="info-box">
                                        <a href="{{ route('project.show', [$project->id, $project->slug]) }}"
                                            class="read-more">
                                            @svg('fas-long-arrow-alt-right', 'text-white')
                                        </a>
                                        <h6 class="title">
                                            <a
                                                href="{{ route('project.show', [$project->id, $project->slug]) }}">{{ $project->title }}</a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
