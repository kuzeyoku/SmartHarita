<header class="header--sticky header-one ">
    <div class="header-top header-top-one bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-xl-block d-none">
                    <div class="left">
                        @if (settings('contact.email'))
                            <div class="mail">
                                <a href="mailto:{{ settings('contact.email') }}"><i class="fal fa-envelope"></i>
                                    {{ settings('contact.email') }}</a>
                            </div>
                        @endif
                        @if (settings('contact.phone'))
                            <div class="phone">
                                <a href="tel:{{ settings('contact.phone') }}"><i class="fal fa-phone"></i>
                                    {{ settings('contact.phone') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 d-xl-block d-none">
                    <div class="right">
                        <ul class="top-nav">
                            @foreach (settings('social.platforms', []) as $platform)
                                <li>
                                    <a href="{{ settings('social.' . $platform) }}"><i
                                            class="fab fa-{{ $platform }}"></i>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main-one bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-4 col-4">
                    <div class="thumbnail">
                        <a href='{{ route('home') }}'>
                            <img src="{{ $themeAsset->logo_dark }}" alt="{{ settings('general.title') }}">
                        </a>
                    </div>
                </div>
                <div class=" col-xl-9 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="main-header">
                        <nav class="nav-main mainmenu-nav d-none d-xl-block">
                            <ul class="mainmenu">
                                @foreach ($headerMenu as $menu)
                                    @if ($menu->parent_id === 0)
                                        @if ($menu->subMenu->isNotEmpty())
                                            @include('layout.menu', ['menu' => $menu])
                                        @else
                                            <li class="{{ $menu->subMenu->isNotEmpty() ? 'has-droupdown' : '' }}">
                                                <a href="{{ $menu->url }}">{{ $menu->title }}</a>
                                            </li>
                                        @endif
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                        <div class="button-area">
                            <a href="{{ route('contact.index') }}"
                                class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn">@lang('front/contact.txt1')</a>
                            <button id="menu-btn" class="menu rts-btn btn-primary-alta ml--20 ml_sm--5">
                                <img class="menu-dark" src="{{ themeAsset('front', 'images/icon/menu.png') }}"
                                    alt="Menu-icon">
                                <img class="menu-light" src="{{ themeAsset('front', 'images/icon/menu-light.png') }}"
                                    alt="Menu-icon">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="side-bar" class="side-bar">
    <button class="close-icon-menu"><i class="far fa-times"></i></button>
    <div class="rts-sidebar-menu-desktop">
        <a class='logo-1' href='{{ route('home') }}'><img class="logo" src="{{ $themeAsset->logo_light }}"
                alt="finbiz_logo"></a>
        <div class="body d-none d-xl-block">
            <p class="disc">
                {{ settings('general.description') }}
            </p>
            <div class="get-in-touch">
                <div class="h6 title">@lang('front/header.txt1')</div>
                <div class="wrapper">
                    <div class="single">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:{{ settings('contact.phone') }}">{{ settings('contact.phone') }}</a>
                    </div>
                    <div class="single">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{ settings('contact.email') }}">{{ settings('contact.email') }}</a>
                    </div>
                    <div class="single">
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="#">{{ settings('contact.address') }}</a>
                    </div>
                </div>
                <div class="social-wrapper-two menu">
                    @foreach (settings('social.platforms', []) as $platform)
                        <a href="{{ settings('social.' . $platform) }}"><i class="fab fa-{{ $platform }}"></i></a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="body-mobile d-block d-xl-none">
            <nav class="nav-main mainmenu-nav">
                <ul class="mainmenu">
                    @foreach ($headerMenu as $menu)
                        @if ($menu->parent_id === 0)
                            @if ($menu->subMenu->isNotEmpty())
                                @include('layout.menu', ['menu' => $menu])
                            @else
                                <li class="{{ $menu->subMenu->isNotEmpty() ? 'has-droupdown' : '' }}">
                                    <a href="{{ $menu->url }}">{{ $menu->title }}</a>
                                </li>
                            @endif
                        @endif
                    @endforeach
                    <li class="menu-item menu-item"><a class='menu-link'
                            href='{{ route('contact.index') }}'>@lang('front/contact.txt1')</a></li>
                </ul>
            </nav>
            <div class="social-wrapper-two menu mobile-menu">
                @foreach (settings('social.platforms', []) as $platform)
                    <a href="{{ settings('social.' . $platform) }}"><i class="fab fa-{{ $platform }}"></i></a>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div id="anywhere-home"></div>
