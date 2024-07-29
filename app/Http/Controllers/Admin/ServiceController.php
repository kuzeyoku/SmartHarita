<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Service;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use App\Services\Admin\ServiceService;
use App\Http\Requests\Service\StoreServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;
use Illuminate\Support\Facades\View;

class ServiceController extends Controller
{
    protected $service;

    public function __construct(ServiceService $service)
    {
        $this->service = $service;
        View::share([
            "categories" => $this->service->getCategories(ModuleEnum::Service),
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

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreServiceRequest $request)
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

    public function edit(Service $service)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        try {
            $this->service->update($request, $service);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $service->title]));
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

    public function destroy(Service $service)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $service->title]));
            $this->service->delete($service);
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
