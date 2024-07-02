@extends(themeView('admin', 'layout.edit'), ['tab' => true, 'item' => $page])
@section('form')
    @foreach (LanguageList() as $lang)
        <div id="{{ $lang->code }}" class="tab-pane @if ($loop->first) active show @endif">
            {{ html()->label(__("admin/{$folder}.form_title")) }}
            {{ html()->text("title[$lang->code]", $page->titles[$lang->code])->placeholder(__("admin/{$folder}.form_title_placeholder"))->class('form-control') }}
            {{ html()->label(__("admin/{$folder}.form_description")) }}
            {{ html()->textarea("description[$lang->code]", $page->descriptions[$lang->code])->class('editor') }}
        </div>
    @endforeach
    {{ html()->label(__('admin/general.status')) }}
    {{ html()->select('status', statusList())->class('form-control') }}
@endsection
