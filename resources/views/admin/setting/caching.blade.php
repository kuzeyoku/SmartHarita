    @extends(themeView('admin', 'setting.main'))
    @section('setting_form')
        {{ html()->label(__("admin/{$folder}.caching_status")) }}
        {{ html()->select('status', App\Enums\StatusEnum::getOnOffSelectArray(), settings('caching.status'))->class('form-control') }}
        {{ html()->label(__("admin/{$folder}.caching_time")) }}
        {{ html()->text('time', settings('caching.time'))->placeholder(__("admin/{$folder}.caching_time_placeholder"))->class('form-control') }}
    @endsection
