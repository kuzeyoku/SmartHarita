<?php

namespace App\Services\Admin;

use App\Models\Menu;
use App\Models\Page;
use App\Enums\ModuleEnum;
use Illuminate\Http\Request;
use App\Models\MenuTranslate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;

class MenuService extends BaseService
{
    protected $menu;

    public function __construct(Menu $menu)
    {
        parent::__construct($menu, ModuleEnum::Menu);
    }

    public function create(Request $request)
    {
        $data = new Request([
            "url" => $request->urlSelect ?? $request->url,
            "parent_id" => $request->parent_id ?? 0,
            "order" => $request->order,
            "blank" => $request->blank ?? false,
        ]);

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Request $request, Model $menu)
    {
        $data = new Request([
            "url" => $request->urlSelect ?? $request->url,
            "parent_id" => $request->parent_id ?? 0,
            "order" => $request->order,
            "blank" => $request->blank ?? false,
        ]);

        $query = parent::update($data, $menu);

        if ($query) {
            $this->translations($menu->id, $request);
        }

        return $query;
    }

    public function delete(Model $menu)
    {
        $query = parent::delete($menu);

        if ($query) {
            Menu::whereParentId($menu->id)->delete();
        }
        return $query;
    }

    public function translations(int $menuId, Object $request)
    {
        languageList()->each(function ($item) use ($menuId, $request) {
            MenuTranslate::updateOrCreate(
                [
                    "menu_id" => $menuId,
                    "lang" => $item->code
                ],
                [
                    "title" => $request->title[$item->code] ?? null,
                ]
            );
        });
    }

    public function getUrlList(): array
    {

        $pages = Cache::remember("pages_menu_list", settings("caching.time", 3600), function () {
            return Page::active()->get()->each(function ($item) {
                $item->title = $item->title;
                $item->url = $item->url;
            })->pluck("title", "url");
        });

        return [
            route("home") => __("admin/general.home"),
            route(ModuleEnum::Blog->Route() . ".index") => ModuleEnum::Blog->singleTitle(),
            route(ModuleEnum::Service->Route() . ".index") => ModuleEnum::Service->singleTitle(),
            //route(ModuleEnum::Product->Route() . ".index") => ModuleEnum::Product->singleTitle(),
            route(ModuleEnum::Project->Route() . ".index") => ModuleEnum::Project->singleTitle(),
            //route(ModuleEnum::Reference->Route() . ".index") => ModuleEnum::Reference->singleTitle(),
            route("contact.index") => __("front/contact.txt1"),
            "Sayfalar" => $pages ?? [],
        ];
    }
}
