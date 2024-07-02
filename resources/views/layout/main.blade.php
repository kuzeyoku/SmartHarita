<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', settings('general.title'))</title>
    <meta name="description" content="@yield('description', settings('general.description'))">
    <meta name="keywords" content="@yield('keywords', settings('general.keywords'))">
    @include('layout.seo')
    <link href="{{ themeAsset('front', 'css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/animate.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/owl.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/style.css') }}" rel="stylesheet">
    <link href="{{ themeAsset('front', 'css/responsive.css') }}" rel="stylesheet">
    @stack('style')
    <link rel="shortcut icon" href="{{ $themeAsset->favicon }}" type="image/x-icon">
    <link rel="icon" href="{{ $themeAsset->favicon }}" type="image/x-icon">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
    <div class="page-wrapper">
        <div class="preloader"></div>
        @include('layout.header')
        @yield('content')
        @include('layout.footer')
        @include('layout.cookie_alert')
    </div>
    <div class="scroll-to-top scroll-to-target" data-target="html">@svg('fas-angle-up', 'text-white')</div>
    <script src="{{ themeAsset('front', 'js/jquery.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/popper.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/bootstrap.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/jquery.fancybox.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/wow.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/appear.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/knob.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/select2.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/owl.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/script.js') }}"></script>
    @stack('script')
    @include('layout.alert')
</body>

</html>
