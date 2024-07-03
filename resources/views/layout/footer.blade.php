<div class="rts-footer-area footer-three footer-four rts-section-gapTop footer-bg-2">
    <div class="container pb--100 pb_sm--40">
        <div class="row g-5">
            <div class="col-xl-3 col-lg-6">
                <div class="footer-three-single-wized left">
                    <a href="index.htm" class="logo_footer">
                        <img src="{{ themeAsset('front', 'images/logo/logo-5.1.svg') }}" alt="Logo-image">
                    </a>
                    <p class="disc">{{ settings('general.description') }}</p>
                    <ul class="social-three-wrapper">
                        @foreach (settings('social.platforms') as $platform)
                            <li><a href="{{ settings('social.' . $platform) }}"><i
                                        class="fab fa-{{ settings('social.' . $platform) }}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- footer three mid area -->
            <div class="col-xl-6 col-lg-6">
                <div class="row">
                    <!-- footer mid area left -->
                    <div class="col-lg-6">
                        <div class="footer-three-single-wized mid-left">
                            <h5 class="title">Office Information</h5>
                            <div class="body">
                                <div class="info-wrapper">
                                    <div class="single">
                                        <ul class="icon">
                                            <li><i class="fas fa-phone-alt"></i></li>
                                        </ul>
                                        <div class="info">
                                            <span>Call Us 24/7</span>
                                            <a href="#">{{ settings('contact.phone') }}</a>
                                        </div>
                                    </div>
                                    <div class="single">
                                        <ul class="icon">
                                            <li><i class="far fa-envelope"></i></li>
                                        </ul>
                                        <div class="info">
                                            <span>Work with us</span>
                                            <a href="#">{{ settings('contact.email') }}</a>
                                        </div>
                                    </div>
                                    <div class="single">
                                        <ul class="icon">
                                            <li><i class="fas fa-map-marker-alt"></i></li>
                                        </ul>
                                        <div class="info">
                                            <span>Our Location</span>
                                            <a href="#">{{ settings('contact.address') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer mid area left end -->

                    <!-- footer mid area right -->
                    <div class="col-lg-6">
                        <div class="footer-three-single-wized mid-right">
                            <h5 class="title">Get Updates</h5>
                            <div class="body">
                                <div class="update-wrapper">
                                    <p class="disc">Sign up for our latest news & articles. We won’t give you spam
                                        mails.</p>
                                    <form class="email-footer-area">
                                        <input type="email" placeholder="Enter Email Address" required="">
                                        <button type="submit"><i class="fas fa-location-arrow"></i></button>
                                    </form>
                                    <div class="note-area">
                                        <p><span>Note:</span> We do not publish your email</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- footer mid area right end -->
                </div>
            </div>
            <!-- footer three mid area ENd -->
            <div class="col-xl-3 col-lg-6">
                <div class="footer-three-single-wized right">
                    <h5 class="title">Instagram Posts</h5>
                    <div class="body">
                        <div class="footer-gallery-inner">
                            <a href="#"><img src="assets/images/footer/three-gallery/01.png"
                                    alt="Footer-gallery"></a>
                            <a href="#"><img src="assets/images/footer/three-gallery/02.png"
                                    alt="Footer-gallery"></a>
                            <a href="#"><img src="assets/images/footer/three-gallery/03.png"
                                    alt="Footer-gallery"></a>
                            <a href="#"><img src="assets/images/footer/three-gallery/04.png"
                                    alt="Footer-gallery"></a>
                            <a href="#"><img src="assets/images/footer/three-gallery/05.png"
                                    alt="Footer-gallery"></a>
                            <a href="#"><img src="assets/images/footer/three-gallery/06.png"
                                    alt="Footer-gallery"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-area">
        <div class="container">
            <p class="disc text-center ptb--25">
                FINBIZ - Copyright 2022. All rights reserved.
            </p>
        </div>
    </div>
</div>
<div class="loader-wrapper">
    <div class="loader">
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewbox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
    </svg>
</div>
