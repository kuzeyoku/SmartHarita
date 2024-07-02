<section class="page-title" style="background-image: url({{ $themeAsset->breadcrumb }});">
    <div class="auto-container">
        <div class="title-outer">
            <h1 class="title">@yield('title')</h1>
            <ul class="page-breadcrumb">
                <li><a href="{{ route('home') }}">@lang('front/breadcrumb.txt1')</a></li>
                @hasSection('parent_title')
                    <li><a href="@yield('parent_url')">@yield('parent_title')</a></li>
                @endif
                <li>@yield('title')</li>
            </ul>
        </div>
    </div>
</section>
