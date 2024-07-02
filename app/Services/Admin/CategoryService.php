<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CategoryTranslate;
use Illuminate\Database\Eloquent\Model;

class CategoryService extends BaseService
{
    protected $category;

    public function __construct(Category $category)
    {
        parent::__construct($category, ModuleEnum::Category);
    }

    public function create(Request $request)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        if ($request->parent == 0) {
            $arr["module"] = $request->module;
        } else {
            $parent = Category::find($request->parent);
            $arr["module"] = $parent->module;
        }

        $data = new Request(array_merge($arr, $request->only("order", "status", "parent_id")));

        $query = parent::create($data);

        if ($query->id) {
            $this->translations($query->id, $request);
        }

        return $query;
    }

    public function update(Request $request, $category)
    {
        $arr = ["slug" => Str::slug($request->title[$this->defaultLocale])];

        if ($request->parent != 0) {
            $parent = Category::find($request->parent);
            $arr["module"] = $parent->module;
        } else {
            $arr["module"] = $request->module;
        }

        $data = new Request(array_merge($arr, $request->only("order", "status", "parent_id")));

        $query = Parent::update($data, $category);

        if ($query) {
            $this->translations($category->id, $request);
        }

        return $query;
    }

    protected function translations(int $categoryId, Request $request)
    {
        languageList()->each(function ($lang) use ($categoryId, $request) {
            CategoryTranslate::updateOrCreate(
                [
                    "category_id" => $categoryId,
                    "lang" => $lang->code
                ],
                [
                    "title" => $request->title[$lang->code],
                    "description" => $request->description[$lang->code]
                ]
            );
        });
    }

    public function delete(Model $category)
    {
        Category::where("parent_id", $category->id)->delete();
        return parent::delete($category);
    }
}
