@extends('layout.main')
@section('title', __('front/contact.txt1'))
@section('content')
    @include('layout.breadcrumb')
    <div class="rts-contact-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-contact-one-inner">
                        <div class="thumbnail">
                            <img src="{{ $themeAsset->contact1 }}" alt="">
                        </div>
                        <div class="content">
                            <div class="icone">
                                <img src="{{ themeAsset('front', 'images/contact/shape/01.svg') }}" alt="">
                            </div>
                            <div class="info">
                                <span>@lang('front/contact.txt2')</span>
                                <a href="tel:{{ settings('contact.phone') }}">
                                    <h5>{{ settings('contact.phone') }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-contact-one-inner">
                        <div class="thumbnail">
                            <img src="{{ $themeAsset->contact2 }}" alt="">
                        </div>
                        <div class="content">
                            <div class="icone">
                                <img src="{{ themeAsset('front', 'images/contact/shape/02.svg') }}" alt="">
                            </div>
                            <div class="info">
                                <span>@lang('front/contact.txt3')</span>
                                <a href="mailto:{{ settings('contact.email') }}">
                                    <h5>{{ settings('contact.email') }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="single-contact-one-inner">
                        <div class="thumbnail">
                            <img src="{{ $themeAsset->contact3 }}" alt="">
                        </div>
                        <div class="content">
                            <div class="icone">
                                <img src="{{ themeAsset('front', 'images/contact/shape/03.svg') }}" alt="">
                            </div>
                            <div class="info">
                                <span>@lang('front/contact.txt4')</span>
                                <a href="#">
                                    <h5>{{ settings('contact.address') }}</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if (settings('contact.map'))
        <div class="rts-contact-map-area">
            <div class="contaciner-fluid">
                <div class="contact-map-area-fluid">
                    <iframe class="contact-map" src="{{ settings('contact.map') }}" style="border:0;" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    @endif
    <div class="rts-contact-form-area">
        <div class="container">
            <div class="rts-contact-fluid rts-section-gap">
                <div data-title="@lang('front/contact.txt1')" class="rts-title-area contact-fluid text-center mb--50">
                    <p class="pre-title">
                        @lang('front/contact.txt5')
                    </p>
                    <h2 class="title">@lang('front/contact.txt6')</h2>
                </div>
                <div class="form-wrapper">
                    {{ html()->form()->route('contact.send')->id('contact-form')->open() }}
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            {{ html()->text('name')->placeholder(__('front/contact.txt7')) }}
                            @if ($errors->has('name'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 mb-3">
                            {{ html()->email('email')->placeholder(__('front/contact.txt8')) }}
                            @if ($errors->has('email'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 mb-3">
                            {{ html()->text('phone')->placeholder(__('front/contact.txt9')) }}
                            @if ($errors->has('phone'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 mb-3">
                            {{ html()->text('subject')->placeholder(__('front/contact.txt10')) }}
                            @if ($errors->has('subject'))
                                <div class="invalid-feedback d-block">
                                    {{ $errors->first('subject') }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        {{ html()->textarea('message')->placeholder(__('front/contact.txt11')) }}
                        @if ($errors->has('message'))
                            <div class="invalid-feedback d-block">
                                {{ $errors->first('message') }}
                            </div>
                        @endif
                    </div>
                    <button class="rts-btn btn-primary g-recaptcha"
                        data-sitekey="{{ settings('integration.recaptcha_site_key') }}" data-callback='onSubmit'
                        data-action='submit'>
                        <span class="btn-title">@lang('front/contact.txt12')</span>
                    </button>
                    {{ html()->form()->close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
@if (settings('integration.recaptcha_status') == App\Enums\StatusEnum::Active->value)
    @push('script')
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script>
            function onSubmit(token) {
                document.getElementById("contact-form").submit();
            }
        </script>
    @endpush
@endif
@push('script')
    <script src="{{ themeAsset('front', 'js/sweetalert2.all.min.js') }}"></script>
@endpush
