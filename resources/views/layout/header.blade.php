<header class="header--sticky header-one ">
    <div class="header-top header-top-one bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-xl-block d-none">
                    <div class="left">
                        <div class="mail">
                            <a href="mailto:webmaster@example.com"><i class="fal fa-envelope"></i>
                                {{ settings('contact.email') }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-xl-block d-none">
                    <div class="right">
                        <ul class="top-nav">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li><a class="mr--0" href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main-one bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="thumbnail">
                        <a href='{{ route('home') }}'>
                            <img src="{{ themeAsset('front', 'images/logo/logo-1.svg') }}" alt="finbiz-logo">
                        </a>
                    </div>
                </div>
                <div class=" col-xl-9 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="main-header">
                        <nav class="nav-main mainmenu-nav d-none d-xl-block">
                            <ul class="mainmenu">
                                <li class="has-droupdown">
                                    <a class="nav-link" href="#">Services</a>
                                    <ul class="submenu menu-link3">
                                        <li class="sub-droupdown">
                                            <a class="sub-menu-link" href="#">Our Service</a>
                                            <ul class="submenu third-lvl">
                                                <li><a href='our-service.html'>Service 1</a></li>
                                                <li><a href='service-2.html'>Service 2</a></li>
                                                <li><a href='service-3.html'>Service 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href='service-details.html'>Service Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a class="nav-link" href="#">Pages</a>
                                    <ul class="submenu menu-link">
                                        <li class="menu-item">
                                            <a class="tag" href="#">Pages</a>
                                            <ul>
                                                <li><a href='appoinment.html'>Appoinment</a></li>
                                                <li><a href='about-us.html'>About Us</a></li>
                                                <li><a href='price-plan.html'>Price Plans</a></li>
                                                <li><a href='our-service.html'>Our Services</a></li>
                                                <li><a href='testimonial-style-1.html'>Testimonial</a></li>
                                                <li><a href='404.html'>404 Page</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a class="tag" href="#">Portfolio</a>
                                            <ul>
                                                <li><a href='project.html'>Portfolio Style 1</a></li>
                                                <li><a href='portfolio-style-2.html'>Portfolio Style 2</a></li>
                                                <li><a href='portfolio-style-3.html'>Portfolio Style 3</a></li>
                                                <li><a href='portfolio-style-4.html'>Portfolio Style 4</a></li>
                                                <li><a href='portfolio-style-5.html'>Portfolio Style 5</a></li>
                                                <li><a href='project-details.html'>Portfolio Details</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a class="tag" href="#">Our Teams</a>
                                            <ul>
                                                <li><a href='team.html'>Team Style 1</a></li>
                                                <li><a href='team-style-2.html'>Team Style 2</a></li>
                                                <li><a href='team-style-3.html'>Team Style 3</a></li>
                                                <li><a href='team-style-4.html'>Team Style 4</a></li>
                                                <li><a href='team-style-5.html'>Team Style 5</a></li>
                                                <li><a href='team-details.html'>Team Details</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a class="nav-link" href="#">Blog</a>
                                    <ul class="submenu">
                                        <li><a href='blog-list.html'>Blog List</a></li>
                                        <li><a href='blog-grid.html'>Blog Grid</a></li>
                                        <li><a href='blog-details.html'>Blog Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-droupdown">
                                    <a class="nav-link" href="#">Elements</a>
                                    <ul class="submenu menu-link2">
                                        <li class="menu-item">
                                            <ul>
                                                <li><a href='accordion.html'>Accordion</a></li>
                                                <li><a href='address-box.html'>Address Box</a></li>
                                                <li><a href='button.html'>Button</a></li>
                                                <li><a href='blog-grid.html'>Blog Grid</a></li>
                                                <li><a href='blog-slider.html'>Blog Slider</a></li>
                                                <li><a href='blog-quote.html'>Blog Quote</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <ul>
                                                <li><a href='heading.html'>Heading</a></li>
                                                <li><a href='cta.html'>Call To Action</a></li>
                                                <li><a href='contact-form.html'>Contact Form</a></li>
                                                <li><a href='counter.html'>Counter Up</a></li>
                                                <li><a href='brand.html'>Brand Logo</a></li>
                                                <li><a href='video.html'>Video Addon</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <ul>
                                                <li><a href='pricing.html'>Pricing Table</a></li>
                                                <li><a href='typography.html'>Typography</a></li>
                                                <li><a href='tab-addon.html'>Tab Addon</a></li>
                                                <li><a href='progress-bar.html'>Progress Bar</a></li>
                                                <li><a href='testimonial.html'>Testimonial</a></li>
                                                <li><a href='working-process.html'>Working Process</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                        <div class="button-area">
                            <button id="search" class="rts-btn btn-primary-alta"><i
                                    class="far fa-search"></i></button>
                            <a href="{{ route('contact.index') }}"
                                class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn">Get
                                Quote</a>
                            <button id="menu-btn" class="menu rts-btn btn-primary-alta ml--20 ml_sm--5">
                                <img class="menu-dark" src="{{ themeAsset('front', '/images/icon/menu.png') }}"
                                    alt="Menu-icon">
                                <img class="menu-light" src="{{ themeAsset('front', '/images/icon/menu-light.png') }}"
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
        <a class='logo-1' href='{{ route('home') }}'><img class="logo"
                src="{{ themeAsset('front', 'images/logo/logo-1.svg') }}"></a>
        <a class='logo-2' href='{{ route('home') }}'><img class="logo"
                src="{{ themeAsset('front', 'images/logo/logo-4.svg') }}"></a>
        <a class='logo-3' href='{{ route('home') }}'><img class="logo"
                src="{{ themeAsset('front', 'images/logo/logo-3.svg') }}"></a>
        <a class='logo-4' href='{{ route('home') }}'><img class="logo"
                src="{{ themeAsset('front', 'images/logo/logo-5.svg') }}"></a>
        <div class="body d-none d-xl-block">
            <p class="disc">
                {{ settings('general.description') }}
            </p>
            <div class="get-in-touch">
                <!-- title -->
                <div class="h6 title">İletişime Geç</div>
                <!-- title End -->
                <div class="wrapper">
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-phone-alt"></i>
                        <a href="#">{{ settings('contact.phone') }}</a>
                    </div>
                    <div class="single">
                        <i class="fas fa-envelope"></i>
                        <a href="#">{{ settings('contact.email') }}</a>
                    </div>
                    <div class="single">
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="#">{{ settings('contact.address') }}</a>
                    </div>
                </div>
                <div class="social-wrapper-two menu">
                    @foreach (settings('social.platforms') as $platform)
                        <a href="{{ settings('social.' . $platform) }}"><i
                                class="fab fa-{{ settings('social.' . $platform) }}-f"></i></a>
                    @endforeach
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
                                    <li class="mobile-menu-link"><a href='onepage-ten.html'>Startup Agency</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-eleven.html'>Branding-Agency</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <a href="#0" class="tag">Onepages</a>
                                    <li class="mobile-menu-link"><a href='onepage-one.html'>Main Home Onepage</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-two.html'>Consulting Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-three.html'>Corporate Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-four.html'>Insurance Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-five.html'>Marketing Home
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-six.html'>Finance Home
                                            Onepage</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-seven.html'>Human Resources
                                            Onepage</a></li>
                                    <li class="mobile-menu-link"><a href='onepage-eight.html'>IT Solutions
                                            Onepage</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-nine.html'>Modern Agency</a>
                                    </li>
                                    <li class="mobile-menu-link"><a href='onepage-ten.html'>Startup Agency</a>
                                    </li>
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
            <a href="#" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btnmenu">Get
                Quote</a>
        </div>
    </div>
    <!-- inner menu area desktop End -->
</div>

<div class="search-input-area">
    <div class="container">
        <div class="search-input-inner">
            <div class="input-div">
                <input id="searchInput1" class="search-input" type="text" placeholder="Search by keyword or #">
                <button><i class="far fa-search"></i></button>
            </div>
        </div>
    </div>
    <div id="close" class="search-close-icon"><i class="far fa-times"></i></div>
</div>

<div id="anywhere-home">
</div>
