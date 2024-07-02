@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="alert alert-info">@lang("admin/{$folder}.seo_alert")</div>
    {{ html()->label(__("admin/{$folder}.seo_index")) }}
    {{ html()->select('index', array_reverse(App\Enums\StatusEnum::getOnOffSelectArray()), settings('seo.index'))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.seo_open_graph")) }}
    {{ html()->select('open_graph', array_reverse(App\Enums\StatusEnum::getOnOffSelectArray()), settings('seo.open_graph'))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.seo_twitter_card")) }}
    {{ html()->select('twitter_card', array_reverse(App\Enums\StatusEnum::getOnOffSelectArray()), settings('seo.twitter_card'))->class('form-control') }}
    {{ html()->label(__("admin/{$folder}.seo_schema")) }}
    {{ html()->select('schema', array_reverse(App\Enums\StatusEnum::getOnOffSelectArray()), settings('seo.schema'))->class('form-control') }}
@endsection
