<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\Admin\ProductService;
use App\Http\Requests\Product\ImageProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProductController extends Controller
{
    protected $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
        View::share([
            "categories" => $this->service->getCategories(),
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact('items'));
    }

    public function show(Product $product)
    {
        return view(themeView("admin", "{$this->service->folder()}.show"), compact('product'));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getFallbackLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function edit(Product $product)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("product"));
    }

    public function image(Product $product)
    {
        return view(themeView("admin", "layout.image"), ["item" => $product]);
    }

    public function imageStore(ImageProductRequest $request, Product $product): object
    {
        if ($this->service->imageUpload($request, $product)) {
            return (object) [
                "message" => __("admin/{$this->service->folder()}.image_success")
            ];
        } else {
            return (object) [
                "message" => __("admin/{$this->service->folder()}.image_error")
            ];
        }
    }

    public function imageDelete(Media $image)
    {
        try {
            $this->service->imageDelete($image);
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.image_delete_success"));
        } catch (Throwable $e) {
            dd($e->getMessage());
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.image_delete_error"));
        }
    }

    public function imageAllDelete(Product $product)
    {
        try {
            $this->service->imageAllDelete($product);
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.image_delete_all_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.image_delete_error"));
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $this->service->update($request, $product);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $product->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }

    public function statusUpdate(Request $request, int $page)
    {
        $request->validate(["status" => "required"]);
        try {
            $this->service->statusUpdate($request, $page);
            return back();
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.status_error"));
        }
    }

    public function destroy(Product $product)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $product->title]));
            $this->service->delete($product);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        }
    }
}
