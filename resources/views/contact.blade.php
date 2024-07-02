@extends('layout.main')
@section('title', __('front/contact.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <section class="contact-details">
        <div class="container ">
            <div class="row">
                <div class="col-xl-5 col-lg-6 mb-md-60">
                    <div class="contact-details__right">
                        <div class="sec-title">
                            <span class="sub-title">@lang('front/contact.txt2')</span>
                            <h2>@lang('front/contact.txt3')</h2>
                            <div class="text">@lang('front/contact.txt4')</div>
                        </div>
                        <ul class="list-unstyled contact-details__info">
                            <li>
                                <div class="icon">
                                    @svg('fas-phone', 'text-white')
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt5')</h6>
                                    <a href="tel:{{ settings('contact.phone') }}">{{ settings('contact.phone') }}</a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    @svg('far-envelope', 'text-white')
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt6')</h6>
                                    <a href="mailto:{{ settings('contact.email') }}"><span
                                            class="__cf_email__">{{ settings('contact.email') }}</span></a>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    @svg('fas-map-marked-alt', 'text-white')
                                </div>
                                <div class="text">
                                    <h6>@lang('front/contact.txt7')</h6>
                                    <span>{{ settings('contact.address') }}</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <iframe src="{{ settings('contact.map') }}" width="100%" height="550" frameborder="0"
                        allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </section>


    <section class="team-contact-form">
        <div class="container pb-100">
            <div class="sec-title text-center">
                <span class="sub-title">@lang('front/contact.txt8')</span>
                <h2 class="section-title__title">@lang('front/contact.txt9')</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    {{ html()->form()->route('contact.send')->open() }}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->text('name')->placeholder(__('front/contact.txt10'))->class('form-control') }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->email('email')->placeholder(__('front/contact.txt11'))->class('form-control') }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->text('phone')->placeholder(__('front/contact.txt12'))->class('form-control') }}
                            </div>
                        </div>
                        <div class="col-lg-6 mb-3">
                            <div class="form-group">
                                {{ html()->text('subject')->placeholder(__('front/contact.txt13'))->class('form-control') }}
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        {{ html()->textarea('message')->placeholder(__('front/contact.txt14'))->class('form-control') }}
                    </div>
                    <button type="submit" class="theme-btn btn-style-one g-recaptcha"
                        data-sitekey="{{ settings('recaptcha.site_key') }}" data-callback='contact-form'
                        data-action='submit'>
                        <span class="btn-title">@lang('front/contact.txt15')</span>
                    </button>
                    <button type="reset" class="theme-btn btn-style-one"><span
                            class="btn-title">@lang('front/contact.txt16')</span></button>
                    {{ html()->form()->close() }}
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ themeAsset('front', 'js/sweetalert2.all.min.js') }}"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contact-form").submit();
        }
    </script>
@endpush
