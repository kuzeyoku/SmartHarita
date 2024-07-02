<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use App\Models\BlogComment;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{

    public function index()
    {
        if (settings("caching.status", StatusEnum::Passive->value) == StatusEnum::Active->value) {
            $cacheKey = ModuleEnum::Blog->value . "_list_" . (Paginator::resolveCurrentPage() ?: 1) . "_" . app()->getLocale();
            $data = Cache::remember($cacheKey, settings("caching.time", 3600), function () {
                return [
                    "posts" => Blog::active()->order()->paginate(settings("pagination.front", 10)),
                    "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                    "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
                ];
            });
        } else {
            $data = [
                "posts" => Blog::active()->order()->paginate(settings("pagination.front", 10))->onEachSide(1),
                "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
            ];
        }
        return view(ModuleEnum::Blog->folder() . ".index", $data);
    }

    public function show(Blog $post)
    {
        $cacheKey = ModuleEnum::Blog->value . "_detail_" . $post->id . "_" . app()->getLocale();
        $post->increment("view_count");
        if (settings("caching.status", StatusEnum::Passive->value) == StatusEnum::Active->value) {
            $data = Cache::remember($cacheKey, settings("caching.time", 3600), function () use ($post) {
                return [
                    "post" => $post,
                    "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                    "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
                    "comments" => $post->comments()->paginate(5),
                ];
            });
        } else {
            $data = [
                "post" => $post,
                "popularPost" => Blog::active()->viewOrder()->take(5)->get(),
                "categories" => Category::active()->whereModule(ModuleEnum::Blog->value)->get(),
                "comments" => $post->comments()->paginate(5),
            ];
        }
        return view(ModuleEnum::Blog->folder() . ".show", $data);
    }

    public function comment_store(Request $request, Blog $post)
    {
        if (!recaptcha($request))
            return back()->withError(__("front/general.recaptcha_error"));
        if (!$this->ipControl($request))
            return back()->withError(__("front/blog.comment_ip_block"));
        try {
            BlogComment::create([
                "post_id" => $post->id,
                "name" => $request->name,
                "email" => $request->email,
                "comment" => $request->comment,
                "ip" => $request->ip(),
                "status" => StatusEnum::Pending->value,
            ]);
            return back()->withSuccess(__("front/blog.comment_success"));
        } catch (\Exception $e) {
            return back()->withInput()->withError(__("front/blog.comment_error"));
        }
    }

    private function ipControl(Request $request)
    {
        $data = BlogComment::whereIp($request->ip())->orderBy("created_at", "DESC")->first();
        if ($data) {
            if ($data->created_at->diffInMinutes(\Carbon\Carbon::now()) < 15)
                return false;
        }
        return true;
    }
}
