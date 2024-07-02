<?php

namespace App\Services\Admin;

use App\Models\Project;
use App\Models\ProjectTranslate;
use App\Enums\ModuleEnum;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class ProjectService extends BaseService
{
    protected $project;

    public function __construct(Project $project)
    {
        parent::__construct($project, ModuleEnum::Project);
    }

    public function create(Object $request)
    {
        $query = parent::create(new Request($request->only("category_id", "video", "model3D", "status", "order")));

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

    public function update(Object $request, Model $project)
    {
        $query = parent::update(new Request($request->only("category_id", "video", "model3D", "status", "order")), $project);

        if ($query) {
            $this->translations($project->id, $request);

            if (isset($request->imageDelete)) {
                $project->clearMediaCollection($this->module->COVER_COLLECTION());
            }

            if (isset($request->image) && $request->image->isValid()) {
                $project->clearMediaCollection($this->module->COVER_COLLECTION());
                try {
                    $project->addMediaFromRequest("image")->usingFileName(Str::random(8) . "." . $request->image->extension())->toMediaCollection($this->module->COVER_COLLECTION());
                } catch (\Exception $e) {
                    //Exception
                }
            }
        }

        return $query;
    }

    public function translations(int $projectId, Object $request)
    {
        languageList()->each(function ($lang) use ($projectId, $request) {
            ProjectTranslate::updateOrCreate(
                [
                    "project_id" => $projectId,
                    "lang" => $lang->code
                ],
                [
                    "title" => $request->title[$lang->code] ?? null,
                    "description" => $request->description[$lang->code] ?? null,
                    "features" => $request->features[$lang->code] ?? null,
                ]
            );
        });
    }

    public function imageUpload(Request $request, Model $project)
    {
        return $project->addMediaFromRequest("file")->usingFileName(Str::random(8) . "." . $request->file->extension())->toMediaCollection($this->module->IMAGE_COLLECTION());
    }
}
