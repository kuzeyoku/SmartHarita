<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ModuleEnum;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected $folder;

    public function __construct()
    {
        $this->folder = ModuleEnum::Service->folder();
    }

    public function rules(): array
    {
        return [
            "title." . app()->getFallbackLocale() => "required",
            "title.*" => "",
            "description.*" => "",
            "status" => "required",
            "order" => "required|numeric|min:0",
            "category_id" => "",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:" . settings("image.max_size", 4096),
            "document" => "file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:" . settings("document.max_size", 4096)
        ];
    }

    public function attributes(): array
    {
        return [
            "title." . app()->getFallbackLocale() => __("admin/{$this->folder}.form_title"),
            "description.*" => __("admin/{$this->folder}.form_description"),
            "category_id" => __("admin/{$this->folder}.form_category"),
            "image" => __("admin/{$this->folder}.form_image"),
            "status" => __("admin/general.status"),
            "order" => __("admin/general.order"),
        ];
    }
}
