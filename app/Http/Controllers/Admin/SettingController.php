<?php

namespace App\Http\Controllers\Admin;

use App\Enums\SettingCategoryEnum;
use Throwable;
use Illuminate\Http\Request;
use App\Services\Admin\SettingService;

class SettingController extends Controller
{
    private $service;

    public function __construct(SettingService $service)
    {
        $this->service = $service;
        view()->share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "service" => $service
        ]);
    }

    public function index()
    {
        if (SettingCategoryEnum::has(request()->category)) {
            return view(themeView("admin", "setting." . request()->category));
        } else {
            abort("404");
        }
    }

    public function update(Request $request)
    {
        try {
            $this->service->update($request);
            LogController::Logger("info", __("admin/{$this->service->folder()}.update_log", ["category" => __("admin/setting.category_" . $request->category)]));
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Throwable $e) {
            LogController::Logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }
}
