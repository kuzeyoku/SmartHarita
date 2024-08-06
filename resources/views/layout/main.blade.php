<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="shortcut icon" href="{{ $themeAsset->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ $themeAsset->favicon }}" type="image/x-icon">
    <title>
        @hasSection('title')
            @yield('title') | {{ settings('general.title') }}
        @else
            {{ settings('general.title') }}
        @endif
    </title>
    <meta name="description" content="@yield('description', settings('general.description'))">
    <meta name="keywords" content="@yield('keywords', settings('general.keywords'))">
    @include('common.seo')
    @if (settings('integration.tag_manager_status') == App\Enums\StatusEnum::Active->value)
        {!! settings('integration.tag_manager_head_code') !!}
    @endif
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/swiper.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/fontawesome-5.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/animate.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/bootstrap.min.css') }}" rel="stylesheet">
    @stack('style')
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/style.css') }}" rel="stylesheet">
</head>

<body>
    @if (settings('integration.tag_manager_status') == App\Enums\StatusEnum::Active->value)
        {!! settings('integration.tag_manager_body_code') !!}
    @endif
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    @include('common.cookie_alert')
    <script src="{{ themeAsset('front', 'js/jquery.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/jqueryui.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/waypoint.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/swiper.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/counterup.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/sal.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/bootstrap.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/waw.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/main.js') }}"></script>
    <script src="{{ themeAsset('common', 'js/jquery.cookie.js') }}"></script>
    @include('common.popup')
    @stack('script')
</body>

</html>
