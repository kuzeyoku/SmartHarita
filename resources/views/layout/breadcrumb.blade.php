<div class="rts-breadcrumb-area breadcrumb-bg bg_image">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                <h1 class="title">@yield('title')</h1>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="bread-tag">
                    <a href='{{ route('home') }}'>@lang('front/breadcrumb.txt1')</a>
                    <span>/&nbsp;</span>
                    @hasSection('parent_title')
                        <a href="@yield('parent_url')">@yield('parent_title')</a>
                    @else
                        <span>@yield('title')</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
