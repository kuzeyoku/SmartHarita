<div class="rts-gallery-area rts-section-gap gallery-bg bg_image">
    <div class="container">
        <div class="row">
            <div class="rts-title-area gallery text-start pl_sm--20">
                <p class="pre-title">
                    @lang('front/project.txt1')
                </p>
                <h2 class="title">@lang('front/project.txt2')</h2>
            </div>
        </div>
        <div class="row mt--45">
            <div class="col-12">
                <div class="swiper mygallery mySwipers">
                    <div class="swiper-wrapper gallery">
                        @foreach ($project as $project)
                            <div class="swiper-slide">
                                <div class="row g-5 w-g-100">
                                    <div class="col-lg-7">
                                        <div class="thumbnail-gallery">
                                            <img src="{{ $project->getFirstMediaUrl('cover') }}" alt="business-images">
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="bg-right-gallery">
                                            <a href="{{ $project->url }}">
                                                <h4 class="title">{{ $project->title }}</h4>
                                            </a>
                                            <p class="disc">{{ $project->short_description }}</p>
                                            <a class='rts-btn btn-primary'
                                                href='{{ $project->url }}'>@lang('front/project.txt3')</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</div>
