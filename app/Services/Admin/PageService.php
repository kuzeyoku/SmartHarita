<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Page;
use App\Models\PageTranslate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class PageService extends BaseService

{
    protected $page;

    public function __construct(Page $page)
    {
        parent::__construct($page, ModuleEnum::Page);
    }

    public function create(Request $request)
    {
        $query = parent::create(new Request($request->only("status", "quick_link")));

        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Request $request, Model $page)
    {
        $query = parent::update(new Request($request->only("status", "quick_link")), $page);

        if ($query) {
            $this->translations($page->id, $request);
        }

        return $query;
    }

    public function translations(int $pageId, Request $request)
    {
        languageList()->each(function ($lang) use ($pageId, $request) {
            PageTranslate::updateOrCreate(
                [
                    "page_id" => $pageId,
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
