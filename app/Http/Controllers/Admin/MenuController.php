<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Menu;
use App\Services\Admin\MenuService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\StoreMenuRequest;
use App\Http\Requests\Menu\UpdateMenuRequest;
use Illuminate\Support\Facades\View;

class MenuController extends Controller
{
    protected $service;

    public function __construct(MenuService $service)
    {
        $this->service = $service;
        View::share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
        ]);
    }

    public function index()
    {
        $data = $this->getData();
        $data["menu"] = null;
        return view(themeView("admin", "{$this->service->folder()}.index"), $data);
    }

    public function edit(Menu $menu)
    {
        $data = $this->getData($menu);
        $data["menu"] = $menu;
        return view(themeView("admin", "{$this->service->folder()}.index"), $data);
    }

    private function getData($menu = null)
    {
        $getMenuData = Menu::order()->get();
        $parents = $getMenuData->whereNotIn("id", [optional($menu)->id] ?? []);
        $data["menus"] = $getMenuData;
        $data["parentList"] = $parents->pluck("title", "id");
        $data["urlList"] = $this->service->getUrlList();
        return $data;
    }

    public function store(StoreMenuRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getFallbackLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        try {
            $this->service->update($request, $menu);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $menu->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.update_error"));
        }
    }

    public function destroy(Menu $menu)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $menu->title]));
            $this->service->delete($menu);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.delete_success"));
        } catch (Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error"));
        }
    }
}
