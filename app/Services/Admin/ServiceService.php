<?php

namespace App\Services\Admin;

use App\Models\Service;
use App\Models\ServiceTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ServiceService extends BaseService
{
    protected $service;

    public function __construct(Service $service)
    {
        parent::__construct($service, ModuleEnum::Service);
    }

    public function create(Request $request)
    {
        $query = parent::create(new Request($request->only("category_id", "status", "order")));

        if ($query) {
            $this->translations($query->id, $request);

            if (isset($request->image) && $request->image->isValid()) {
                try {
                    $query->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }

            if (isset($request->document) && $request->document->isValid()) {
                try {
                    $query->addMediaFromRequest("document")->usingFileName(Str::random(8) . "." . $request->document->extension())->toMediaCollection($this->module->DOCUMENT_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function update(Object $request, Model $service)
    {

        $query = parent::update(new Request($request->only("category_id", "status", "order")), $service);

        if ($query) {
            $this->translations($service->id, $request);

            if (isset($request->imageDelete)) {
                $service->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->documentDelete)) {
                $service->clearMediaCollection($this->module->DOCUMENT_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $service->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $service->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }

            if (isset($request->document) && $request->document->isValid()) {
                $service->clearMediaCollection($this->module->DOCUMENT_COLLECTION());
                try {
                    $service->addMediaFromRequest("document")->usingFileName(Str::random(8) . "." . $request->document->extension())->toMediaCollection($this->module->DOCUMENT_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function translations(int $serviceId, Object $request)
    {
        languageList()->each(function ($lang) use ($serviceId, $request) {
            ServiceTranslate::updateOrCreate(
                [
                    "service_id" => $serviceId,
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
