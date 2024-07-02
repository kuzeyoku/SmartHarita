<?php

namespace App\Services\Admin;

use App\Models\Product;
use App\Models\ProductTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ProductService extends BaseService
{
    protected $product;

    public function __construct(Product $product)
    {
        parent::__construct($product, ModuleEnum::Product);
    }

    public function create(Object $request)
    {
        $query = parent::create(new Request($request->only("category_id", "video", "status", "order")));

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

    public function update(Object $request, Model $product)
    {
        $query = parent::update(new Request($request->only("category_id", "video", "status", "order")), $product);

        if ($query) {
            $this->translations($product->id, $request);

            if (isset($request->imageDelete)) {
                $product->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $product->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $product->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function translations(int $productId, Request $request)
    {
        languageList()->each(function ($lang) use ($productId, $request) {
            ProductTranslate::updateOrCreate(
                [
                    "product_id" => $productId,
                    "lang" => $lang->code
                ],
                [
                    "title" => $request->title[$lang->code] ?? null,
                    "description" => $request->description[$lang->code] ?? null,
                    "features" => $request->features[$lang->code] ?? null,
                ]
            );
        });
    }

    public function imageUpload(Request $request, Model $product)
    {
        return $product->addMediaFromRequest("file")->usingFileName(Str::random(8) . "." . $request->file->extension())->toMediaCollection($this->module->IMAGE_COLLECTION());
    }
}
