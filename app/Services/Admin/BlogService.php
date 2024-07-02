<?php

namespace App\Services\Admin;

use App\Models\Blog;
use App\Models\BlogTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BlogService extends BaseService
{
    protected $blog;

    public function __construct(Blog $blog)
    {
        parent::__construct($blog, ModuleEnum::Blog);
    }

    public function create(Request $request)
    {
        $query = parent::create(new Request($request->only("category_id", "status", "order")));

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

    public function update(Request $request, Model $post)
    {
        $query = parent::update(new Request($request->only("category_id", "status", "order")), $post);

        if ($query) {
            $this->translations($post->id, $request);

            if (isset($request->imageDelete)) {
                $post->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $post->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $post->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function translations(int $postId, Request $request)
    {
        languageList()->each(function ($lang) use ($postId, $request) {
            BlogTranslate::updateOrCreate(
                [
                    "post_id" => $postId,
                    "lang" => $lang->code
                ],
                [
                    "title" => $request->title[$lang->code] ?? null,
                    "description" => $request->description[$lang->code] ?? null,
                    "tags" => $request->tags[$lang->code] ?? null,
                ]
            );
        });
    }
}
