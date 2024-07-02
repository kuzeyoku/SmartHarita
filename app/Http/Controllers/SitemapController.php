<?php

namespace App\Http\Controllers;

use App\Enums\ModuleEnum;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Category;
use App\Enums\StatusEnum;

class SitemapController extends Controller
{
    public function index()
    {
        $data = array();
        if (ModuleEnum::Page->status())
            $data["pages"] = Page::active()->get();
        if (ModuleEnum::Blog->status())
            $data["posts"] = Blog::active()->get();
        if (ModuleEnum::Category->status())
            $data["categories"] = Category::active()->get();
        if (ModuleEnum::Service->status())
            $data["services"] = Service::active()->get();
        if (ModuleEnum::Project->status())
            $data["projects"] = Project::active()->get();
        if (ModuleEnum::Product->status())
            $data["products"] = Product::active()->get();
        $view = view("sitemap", $data)->render();
        return response($view)->header("Content-Type", "text/xml");
    }
}
