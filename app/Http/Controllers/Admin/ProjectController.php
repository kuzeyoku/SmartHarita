<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Services\Admin\ProjectService;
use App\Http\Requests\Project\ImageProjectRequest;
use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class ProjectController extends Controller
{
    protected $service;

    public function __construct(ProjectService $service)
    {
        $this->service = $service;
        view()->share([
            "categories" => $this->service->getCategories(),
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "module" => $this->service->module()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact("items"));
    }

    public function image(Project $project)
    {
        return view(themeView("admin", "layout.image"), compact("project"));
    }

    public function imageStore(ImageProjectRequest $request, Project $project): object
    {
        if ($this->service->imageUpload($request, $project)) {
            return (object) [
                "message" => __("admin/{$this->service->folder()}.image_success")
            ];
        } else {
            return (object) [
                "message" => __("admin/{$this->service->folder()}.image_error")
            ];
        }
    }

    public function imageDelete(Media $image)
    {
        try {
            $this->service->imageDelete($image);
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.image_delete_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.image_delete_error"));
        }
    }

    public function imageAllDelete(Project $project)
    {
        try {
            $this->service->imageAllDelete($project);
            return back()
                ->withSuccess(__("admin/{$this->service->folder()}.image_delete_all_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.image_delete_error"));
        }
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreProjectRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title[app()->getFallbackLocale()]]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->with("success", __("admin/{$this->service->folder()}.create_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function edit(Project $project)
    {
        return view(themeView("admin", "{$this->service->folder()}/edit"), compact("project"));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            $this->service->update($request, $project);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $project->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->with("success", __("admin/{$this->service->folder()}.update_success"));
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

    public function destroy(Project $project)
    {
        try {
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $project->title]));
            $this->service->delete($project);
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
