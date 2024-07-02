<?php

namespace App\Services\Admin;

use App\Models\Brand;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BrandService extends BaseService
{
    protected $imageService;
    protected $brand;

    public function __construct(Brand $brand)
    {
        parent::__construct($brand, ModuleEnum::Brand);
    }

    public function create(Object $request)
    {
        $query = parent::create(new Request($request->only("url", "title", "order", "status")));

        if ($query->id) {
            if (isset($request->image) && $request->image->isValid()) {
                try {
                    $query->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function update(Object $request, Model $brand)
    {
        $query = parent::update(new Request($request->only("url", "title", "order", "status")), $brand);

        if ($query) {
            if (isset($request->imageDelete)) {
                $brand->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $brand->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $brand->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }
}
