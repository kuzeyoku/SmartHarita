<?php

namespace App\Services\Admin;

use App\Models\Popup;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PopupTranslate;
use Illuminate\Database\Eloquent\Model;

class PopupService extends BaseService
{
    protected $imageService;
    protected $popup;

    public function __construct(Popup $popup)
    {
        parent::__construct($popup, ModuleEnum::Popup);
    }

    public function create(Object $request)
    {
        $data = new Request([
            "type" => $request->type,
            "video" => $request->video,
            "url" => $request->url,
            "status" => $request->status,
            "setting" => json_encode([
                "time" => $request->time ?? 0,
                "width" => $request->width ?? 600,
                "closeOnEscape" => $request->closeOnEscape,
                "closeButton" => $request->closeButton,
                "overlayClose" => $request->overlayClose,
                "pauseOnHover" => $request->pauseOnHover,
                "fullScreenButton" => $request->fullScreenButton,
                "color" => $request->color ?? "#88A0B9",
            ])
        ]);

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                try {
                    $query->addMediaFromRequest('image')->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function update(Object $request, Model $popup)
    {
        $data = new Request([
            "type" => $request->type,
            "video" => $request->video,
            "url" => $request->url,
            "status" => $request->status,
            "setting" => json_encode([
                "time" => $request->time ?? 0,
                "width" => $request->width ?? 600,
                "closeOnEscape" => $request->closeOnEscape,
                "closeButton" => $request->closeButton,
                "overlayClose" => $request->overlayClose,
                "pauseOnHover" => $request->pauseOnHover,
                "fullScreenButton" => $request->fullScreenButton,
                "color" => $request->color ?? "#88A0B9",
            ])
        ]);

        $query = parent::update($data, $popup);

        if ($query) {
            $this->translations($popup->id, $request);

            if (isset($request->imageDelete)) {
                parent::imageDelete($popup);
            }

            if (isset($request->image) && $request->image->isValid()) {
                $popup->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $popup->addMediaFromRequest('image')->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }
        return $query;
    }

    public function translations(int $popupId, Request $request)
    {
        languageList()->each(function ($lang) use ($popupId, $request) {
            PopupTranslate::updateOrCreate(
                [
                    "popup_id" => $popupId,
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
