<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\User;
use App\Enums\UserRole;
use App\Services\Admin\UserService;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Controllers\Admin\LogController;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
        View::share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder(),
            "roles" => UserRole::getSelectArray(),
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

    public function store(UserStoreRequest $request)
    {
        try {
            $this->service->create($request);
            LogController::logger("info", __("admin/{$this->service->folder()}.create_log", ["title" => $request->name]));
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

    public function edit(User $user)
    {
        return view(themeView("admin", "{$this->service->folder()}.edit"), compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $this->service->update($request, $user);
            LogController::logger("info", __("admin/{$this->service->folder()}.update_log", ["title" => $request->name]));
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

    public function destroy(User $user)
    {
        if (User::count() == 1) {
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error_last"));
        } else if ($user->id == auth()->user()->id) {
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error_self"));
        } else if (User::where("role", UserRole::ADMIN)->count() == 1) {
            return back()
                ->withError(__("admin/{$this->service->folder()}.delete_error_last_admin"));
        } else {
            try {
                $this->service->delete($user);
                LogController::logger("info", __("admin/{$this->service->folder()}.delete_log", ["title" => $user->name]));
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
}
