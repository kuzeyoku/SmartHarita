@extends(themeView('admin', 'layout.create'), ['tab' => true])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ html()->label(__("admin/{$folder}.form_title")) }}
            {{ html()->text("title[$lang->code]")->placeholder(__("admin/{$folder}.form_title"))->class('form-control') }}
            {{ html()->label(__("admin/{$folder}.form_description")) }}
            {{ html()->textarea("description[$lang->code]")->class('editor') }}
        </div>
    @endforeach
    {{ html()->label(__('admin/general.status')) }}
    {{ html()->select('status', statusList())->class('form-control') }}
@endsection
