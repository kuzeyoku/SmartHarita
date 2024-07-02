@push('style')
    <link href="{{ themeAsset('front', 'css/slider/settings.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ themeAsset('front', 'css/slider/layers.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ themeAsset('front', 'css/slider/navigation.css') }}" rel="stylesheet" type="text/css">
@endpush
@push('script')
    <script src="{{ themeAsset('front', 'js/slider/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/slider/extensions/revolution.extension.video.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/main-slider-script.js') }}"></script>
@endpush
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container" id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                @foreach ($slider as $slider)
                    <li data-index="rs-{{ $loop->iteration }}" data-transition="random-premium">
                        <img loading="lazy" src="{{ $slider->getFirstMediaUrl('cover') }}" alt="" class="rev-slidebg">
                        <div class="tp-caption" data-paddingbottom="[15,15,15,15]" data-paddingleft="[15,15,15,15]"
                            data-paddingright="[15,15,15,15]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['1000','1000','1000','650']"
                            data-whitespace="normal" data-hoffset="['0','0','0','0']" data-voffset="['20','20','0','0']"
                            data-x="['left','left','left','left']" data-y="['middle','middle','middle','middle']"
                            data-textalign="['top','top','top','top']"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            <h1>{{ $slider->title }}</h1>
                            <p class="style-font color3">{{ $slider->description }}</p>
                        </div>
                        <div class="tp-caption" data-paddingbottom="[0,0,0,0]" data-paddingleft="[15,15,15,15]"
                            data-paddingright="[15,15,15,15]" data-paddingtop="[0,0,0,0]" data-responsive_offset="on"
                            data-type="text" data-height="none" data-width="['700','750','700','450']"
                            data-whitespace="normal" data-hoffset="['0','0','0','0']"
                            data-voffset="['215','215','215','215']" data-x="['left','left','left','left']"
                            data-y="['middle','middle','middle','middle']" data-textalign="['top','top','top','top']"
                            data-frames='[{"delay":1000,"speed":1500,"frame":"0","from":"y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'>
                            @if ($slider->button)
                                <a href="{{ $slider->button }}" class="theme-btn btn-style-one bg-theme-color2"><span
                                        class="btn-title">@lang('front/slider.txt1')</span></a>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
