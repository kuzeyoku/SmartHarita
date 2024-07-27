<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @hasSection('title')
            @yield('title') | {{ settings('general.title') }}
        @else
            {{ settings('general.title') }}
        @endif
    </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ themeAsset('front', 'images/fav.png') }}">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/fontawesome-5.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ themeAsset('front', 'css/style.css') }}">
</head>

<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')
    @include('layout.cookie_alert')
    <script src="{{ themeAsset('front', 'js/jquery.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/jqueryui.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/waypoint.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/swiper.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/counterup.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/sal.min.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/waw.js') }}"></script>
    <script src="{{ themeAsset('front', 'js/main.js') }}"></script>
    @stack('script')
    @include('layout.alert')
</body>

</html>
