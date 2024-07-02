<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Reference;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ReferenceService extends BaseService
{
    protected $reference;

    public function __construct(Reference $reference)
    {
        parent::__construct($reference, ModuleEnum::Reference);
    }

    public function create(Object $request)
    {
        $query = parent::create(new Request($request->only("url", "order", "status")));

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

    public function update(Object $request, Model $reference)
    {
        $query = parent::update(new Request($request->only("url", "order", "status")), $reference);

        if ($query) {
            if (isset($request->imageDelete)) {
                $reference->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $reference->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $reference->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }
}
