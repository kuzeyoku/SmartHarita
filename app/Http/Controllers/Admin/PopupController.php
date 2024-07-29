<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Popup;
use Illuminate\Http\Request;
use App\Services\Admin\PopupService;
use App\Http\Requests\Popup\StorePopupRequest;
use App\Http\Requests\Popup\UpdatePopupRequest;
use Illuminate\Support\Facades\View;

class PopupController extends Controller
{
    protected $service;

    public function __construct(PopupService $service)
    {
        $this->service = $service;
        View::share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->route()}.index"), compact("items"));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StorePopupRequest $request)
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

    public function edit(Popup $popup)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact("popup"));
    }

    public function update(UpdatePopupRequest $request, Popup $popup)
    {
        try {
            $this->service->update($request, $popup);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $popup->title]));
            if ($request->has("saveAndContinue"))
                return back()
                    ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
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

    public function destroy(Popup $popup)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $popup->title]));
            $this->service->delete($popup);
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
