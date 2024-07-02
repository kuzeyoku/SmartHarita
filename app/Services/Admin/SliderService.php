<?php

namespace App\Services\Admin;

use App\Models\Slider;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\SliderTranslate;
use Illuminate\Database\Eloquent\Model;

class SliderService extends BaseService
{

    protected $slider;

    public function __construct(Slider $slider)
    {
        parent::__construct($slider, ModuleEnum::Slider);
    }

    public function create(Request $request)
    {
        $query = parent::create(new Request($request->only("button", "video", "status", "order")));

        if ($query->id) {
            $this->translations($query->id, $request);

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

    public function update(Object $request, Model $slider)
    {
        $query = parent::update(new Request($request->only("button", "video", "order", "status")), $slider);

        if ($query) {
            $this->translations($slider->id, $request);

            if (isset($request->imageDelete)) {
                $slider->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $slider->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $slider->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function translations(int $sliderId, Object $request)
    {
        languageList()->each(function ($lang) use ($sliderId, $request) {
            SliderTranslate::updateOrCreate(
                [
                    "slider_id" => $sliderId,
                    "lang" => $lang->code
                ],
                [
                    "title" => $request->title[$lang->code] ?? null,
                    "description" => $request->description[$lang->code] ?? null,
                ]
            );
        });
    }
}
