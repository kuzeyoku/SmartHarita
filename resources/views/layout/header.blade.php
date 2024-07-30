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
                                class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn">İletişim</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
