@extends(themeView('admin', 'setting.main'))
@section('setting_form')
    <div class="row mb-3">
        <div class="col-lg-6">
            {{ html()->label(__("admin/{$folder}.image_folder")) }}
            {{ html()->text('folder', settings('image.folder'))->placeholder(__("admin/{$folder}.image_folder_placeholder"))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ html()->label(__("admin/{$folder}.image_max_size")) }}
            {{ html()->number('max_size', settings('image.max_size'))->placeholder(__("admin/{$folder}.image_max_size_placeholder"))->class('form-control') }}
        </div>
        <div class="col-lg-6">
            {{ html()->label(__("admin/{$folder}.image_quality")) }}
            {{ html()->number('quality', settings('image.quality'))->placeholder(__("admin/{$folder}.image_quality_placeholder"))->class('form-control') }}
        </div>
    </div>
@endsection
