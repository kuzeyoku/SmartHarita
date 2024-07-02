<section class="projects-section style-two pull-up">
    <div class="bg bg-pattern-10 lign"></div>
    <div class="auto-container">
        <div class="sec-title light">
            <span class="sub-title">@lang('front/project.txt1')</span>
            <h2>@lang('front/project.txt2')</h2>
        </div>
        <div class="carousel-outer">
            <div class="projects-carousel-two owl-carousel owl-theme">
                @foreach ($project as $project)
                    <div class="project-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{ $project->url }}"><img loading="lazy"
                                            src="{{ $project->getFirstMediaUrl('cover', 'thumbnail') }}"
                                            alt="{{ $project->title }}"></a>
                                </figure>
                                <div class="info-box">
                                    <a href="{{ $project->url }}" class="read-more">@svg('fas-long-arrow-alt-right', 'text-white')</a>
                                    {{-- <span class="cat">Graphics</span> --}}
                                    <h6 class="title"><a href="{{ $project->url }}">{{ $project->title }}</a>
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
