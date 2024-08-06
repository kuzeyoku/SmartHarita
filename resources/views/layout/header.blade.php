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
    <!-- inner menu area desktop start -->
    <div class="rts-sidebar-menu-desktop">
        <a class='logo-1' href='index.htm'><img class="logo" src="assets/images/logo/logo-1.svg"
                alt="finbiz_logo"></a>
        <a class='logo-2' href='index.htm'><img class="logo" src="assets/images/logo/logo-4.svg"
                alt="finbiz_logo"></a>
        <a class='logo-3' href='index.htm'><img class="logo" src="assets/images/logo/logo-3.svg"
                alt="finbiz_logo"></a>
        <a class='logo-4' href='index.htm'><img class="logo" src="assets/images/logo/logo-5.svg"
                alt="finbiz_logo"></a>
        <div class="body d-none d-xl-block">
            <p class="disc">
                We must explain to you how all seds this mistakens idea denouncing pleasures and praising account.
            </p>
            <div class="get-in-touch">
                <!-- title -->
                <div class="h6 title">Get In Touch</div>
                <!-- title End -->
                <div class="wrapper">
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-phone-alt"></i>
                        <a href="#">+8801234566789</a>
                    </div>
                    <!-- single ENd -->
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-envelope"></i>
                        <a href="#">example@gmail.com</a>
                    </div>
                    <!-- single ENd -->
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-globe"></i>
                        <a href="#">www.webexample.com</a>
                    </div>
                    <!-- single ENd -->
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="#">13/A, New Pro State, NYC</a>
                    </div>
                    <!-- single ENd -->
                </div>
                <div class="social-wrapper-two menu">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <!-- <a href="#"><i class="fab fa-linkedin"></i></a> -->
                </div>
            </div>
        </div>
        <div class="body-mobile d-block d-xl-none">
            <nav class="nav-main mainmenu-nav">
                <ul class="mainmenu">
                    <li class="has-droupdown menu-item">
                        <a class="menu-link" href="#">Home</a>
                        <ul class="submenu">
                            <li>
                                <ul>
                                    <a href="#0" class="tag">Homepages</a>
                                    <li class="mobile-menu-link"><a href='index.htm'>Main Home</a></li>
                                    <li class="mobile-menu-link"><a href='index-two.html'>Consulting Home</a></li>
                                    <li class="mobile-menu-link"><a href='index-three.html'>Corporate Home</a></li>
                                    <li class="mobile-menu-link"><a href='index-four.html'>Insurance Home</a></li>
                                    <li class="mobile-menu-link"><a href='index-five.html'>Marketing Home</a></li>
                                    <li class="mobile-menu-link"><a href='index-six.html'>Finance Home</a></li>
                                    <li class="mobile-menu-link"><a href='index-seven.html'>Human Resources</a></li>
                                    <li class="mobile-menu-link"><a href='index-eight.html'>IT Solutions</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-nine.html'>Modern Agency</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-ten.html'>Startup Agency</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-eleven.html'>Branding-Agency</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <a href="#0" class="tag">Onepages</a>
                                    <li class="mobile-menu-link"><a href='onepage-one.html'>Main Home Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-two.html'>Consulting Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-three.html'>Corporate Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-four.html'>Insurance Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-five.html'>Marketing Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-six.html'>Finance Home Onepage</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-seven.html'>Human Resources
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-eight.html'>IT Solutions Onepage</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-nine.html'>Modern Agency</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-ten.html'>Startup Agency</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-eleven.html'>Branding-Agency</a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item"><a class='menu-link' href='about-us.html'>About Us</a></li>
                    <li class="has-droupdown menu-item">
                        <a class="menu-link" href="#">Services</a>
                        <ul class="submenu">
                            <li class="has-droupdown sub-droupdown">
                                <a href="#">Our Service</a>
                                <ul class="submenu third-lvl mobile-menu">
                                    <li><a href='our-service.html'>Service 1</a></li>
                                    <li><a href='service-2.html'>Service 2</a></li>
                                    <li><a href='service-3.html'>Service 3</a></li>
                                </ul>
                            </li>
                            <li class="mobile-menu-link"><a href='service-details.html'>Service Details</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown menu-item">
                        <a class="menu-link" href="#">Pages</a>
                        <ul class="submenu">
                            <li class="mobile-menu-link"><a href='project.html'>Project</a></li>
                            <li class="mobile-menu-link"><a href='project-details.html'>Project Details</a></li>
                            <li class="mobile-menu-link"><a href='team.html'>Team</a></li>
                            <li class="mobile-menu-link"><a href='team-details.html'>Team Details</a></li>
                            <li class="mobile-menu-link"><a href='appoinment.html'>appoinment</a></li>
                            <li class="mobile-menu-link"><a href='price-plan.html'>Price Plan</a></li>
                            <li class="mobile-menu-link"><a href='404.html'>404 Page</a></li>
                        </ul>
                    </li>
                    <li class="has-droupdown menu-item">
                        <a class="menu-link" href="#">Blog</a>
                        <ul class="submenu">
                            <li class="mobile-menu-link"><a href='blog-list.html'>Blog List</a></li>
                            <li class="mobile-menu-link"><a href='blog-grid.html'>Blog Grid</a></li>
                            <li class="mobile-menu-link"><a href='blog-details.html'>Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item"><a class='menu-link' href='contactus.html'>Contact</a></li>
                </ul>
            </nav>
            <div class="social-wrapper-two menu mobile-menu">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-whatsapp"></i></a>
                <!-- <a href="#"><i class="fab fa-linkedin"></i></a> -->
            </div>
            <a href="#" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btnmenu">Get Quote</a>
        </div>
    </div>
    <!-- inner menu area desktop End -->
</div>
<div id="anywhere-home"></div>
