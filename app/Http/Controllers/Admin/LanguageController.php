<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Language;
use App\Services\Admin\LanguageService;
use App\Http\Requests\Language\StoreLanguageRequest;
use App\Http\Requests\Language\UpdateLanguageRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguageController extends Controller
{
    protected $service;

    public function __construct(LanguageService $languageService)
    {
        $this->service = $languageService;
        View::share([
            'route' => $this->service->route(),
            'folder' => $this->service->folder()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact('items'));
    }

    public function create()
    {
        return view(themeView("admin", "{$this->service->folder()}.create"));
    }

    public function store(StoreLanguageRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.create_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("admin/{$this->service->folder()}.create_error"));
        }
    }

    public function edit(Language $language)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact('language'));
    }

    public function files(Language $language)
    {
        $response = $this->service->files($language);
        $frontFiles = $response['frontFiles'] ?? [];
        $adminFiles = $response['adminFiles'] ?? [];
        $fileContent = $response['fileContent'] ?? [];
        $filename = $response['filename'] ?? null;
        $dir = $response['folder'] ?? null;
        return view(themeView("admin", "{$this->service->folder()}.files"), compact('language', 'frontFiles', 'adminFiles', 'fileContent', 'filename', 'dir'));
    }

    public function updateFileContent(Language $language, Request $request)
    {
        try {
            $this->service->updateFileContent($language);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_file_content_log", ["title" => $language->title]));
            return back()->withSuccess(__("admin/{$this->service->folder()}.update_file_content_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()->withError(__("admin/{$this->service->folder()}.update_file_content_error"));
        }
    }

    public function update(UpdateLanguageRequest $request, Language $language)
    {
        try {
            $this->service->update($request, $language);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->title]));
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.update_success"));
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

    public function destroy(Language $language)
    {
        try {
            $this->service->delete($language);
            LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $language->title]));
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
