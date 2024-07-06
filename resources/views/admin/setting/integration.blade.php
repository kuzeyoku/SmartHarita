@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row">
        <div class="col-lg-6">
            <div class="card-title-head">
                <h6>@lang("admin/{$folder}.recaptcha")</h6>
            </div>
            {{ html()->label(__("admin/{$folder}.recaptcha_status")) }}
            {{ html()->select('recaptcha_status', App\Enums\StatusEnum::getOnOffSelectArray(), settings('integration.recaptcha_status'))->class('form-control') }}
            {{ html()->label(__("admin/{$folder}.recaptcha_site_key")) }}
            {{ html()->text('recaptcha_site_key', settings('integration.recaptcha_site_key'))->placeholder(__("admin/{$folder}.recaptcha_site_key_placeholder"))->class('form-control') }}
            {{ html()->label(__("admin/{$folder}.recaptcha_secret_key")) }}
            {{ html()->text('recaptcha_secret_key', settings('integration.recaptcha_secret_key'))->placeholder(__("admin/{$folder}.recaptcha_secret_key_placeholder"))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            <div class="card-title-head">
                <h6>@lang("admin/{$folder}.analytics")</h6>
            </div>
            {{ html()->label(__("admin/{$folder}.google_analytics_status")) }}
            {{ html()->select('analytics_status', App\Enums\StatusEnum::getOnOffSelectArray(), settings('integration.analytics_status'))->class('form-control') }}
            {{ html()->label(__("admin/{$folder}.google_analytics_code")) }}
            {{ html()->textarea('analytics_code', settings('integration.analytics_code'))->placeholder(__("admin/{$folder}.google_analytics_code_placeholder"))->class('form-control')->rows(3) }}
        </div>
    </div>
@endsection
