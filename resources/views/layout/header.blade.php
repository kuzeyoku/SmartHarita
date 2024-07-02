<header class="main-header header-style-one">
    <div class="header-top">
        <div class="inner-container">
            <div class="top-left">
                <ul class="list-style-one">
                    <li>
                        @svg('fas-envelope', 'icon-space')
                        <a href="mailto:{{ settings('contact.mail') }}">
                            <span class="__cf_email__">{{ settings('contact.email') }}</span>
                        </a>
                    </li>
                    <li>@svg('fas-map-marker', 'icon-space'){{ settings('contact.address') }}</li>
                </ul>
            </div>
            <div class="top-right">
                @if (settings('system.multilanguage', App\Enums\Statusenum::Passive->value) == App\Enums\StatusEnum::Active->value)
                    {{ html()->form()->route('language.set')->open() }}
                    {{ html()->select('locale', languageList()->pluck('title', 'code'), session()->get('locale'))->class('lang-select') }}
                    {{ html()->form()->close() }}
                @endif
                <ul class="social-icon-one">
                    @foreach (settings('social.platforms', []) as $item)
                        <li>
                            <a aria-label="{{ $item }}" onclick="return!window.open(this.href)"
                                href="{{ settings("social.{$item}") }}">@svg('fab-' . $item, 'text-white')</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="header-lower">
        <div class="container-fluid">
            <div class="main-box">
                <div class="logo-box">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ $themeAsset->logo_light }}"
                                alt="{{ settings('general.title', env('APP_NAME')) }}">
                        </a>
                    </div>
                </div>
                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation">
                            @foreach ($headerMenu as $menu)
                                @if ($menu->parent_id === 0)
                                    @if ($menu->subMenu->count() > 0)
                                        @include('layout.menu', ['menu' => $menu])
                                    @else
                                        <li class="{{ $menu->subMenu->count() > 0 ? 'dropdown' : '' }}">
                                            <a href="{{ $menu->url }}">{{ $menu->title }}</a>
                                        </li>
                                    @endif
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="outer-box">
                    <a href="{{ route('contact.index') }}" class="info-btn">
                        <i class="icon">@svg('far-envelope', 'text-white')</i>
                        <span>@lang('front/header.txt1')</span>
                    </a>
                    <div class="mobile-nav-toggler"><span class="icon">@svg('fas-bars', 'text-white')</span></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <nav class="menu-box">
            <div class="upper-box">
                <div class="nav-logo"><a href="{{ route('home') }}"><img src="{{ $themeAsset->logo_light }}"></a>
                </div>
                <div class="close-btn"><i class="icon fa fa-times"></i></div>
            </div>
            <ul class="contact-list-one">
                <li>
                    <div class="contact-info-box">
                        @svg('fas-phone-alt', 'icon')
                        <span class="title">@lang('front/header.txt2')</span>
                        <a href="tel:{{ settings('contact.phone') }}">{{ settings('contact.phone') }}</a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        @svg('far-envelope', 'icon')
                        <span class="title">@lang('front/header.txt3')</span>
                        <a href="mailto:{{ settings('contact.phone') }}"><span
                                class="__cf_email__">{{ settings('contact.email') }}</span></a>
                    </div>
                </li>
                <li>
                    <div class="contact-info-box">
                        @svg('fas-map-marked-alt', 'icon')
                        <span class="title">@lang('front/header.txt4')</span>
                        {{ settings('contact.address') }}
                    </div>
                </li>
            </ul>
            <ul class="social-links">
                @foreach (settings('social.platforms', []) as $item)
                    <li>
                        <a aria-label="{{ $item }}" onclick="return!window.open(this.href)"
                            href="{{ settings("social.{$item}") }}">@svg('fab-' . $item)</a>
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>

    <div class="sticky-header">
        <div class="auto-container">
            <div class="inner-container">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ $themeAsset->logo_dark }}"
                            alt="{{ settings('general.title', env('APP_NAME')) }}">
                    </a>
                </div>
                <div class="nav-outer">
                    <nav class="nav main-menu">
                        <ul class="navigation">
                        </ul>
                    </nav>
                    <div class="mobile-nav-toggler">@svg('fas-bars', 'text-dark')</span></div>
                </div>
            </div>
        </div>
    </div>
</header>
