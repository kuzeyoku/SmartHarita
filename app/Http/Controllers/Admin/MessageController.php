<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Models\Message;
use App\Services\Admin\MessageService;
use App\Http\Requests\Message\ReplyMessageRequest;

class MessageController extends Controller
{
    protected $service;

    public function __construct(MessageService $messageService)
    {
        $this->service = $messageService;
        view()->share([
            "route" => $this->service->route(),
            "folder" => $this->service->folder()
        ]);
    }

    public function index()
    {
        $items = $this->service->all();
        return view(themeView("admin", "{$this->service->folder()}.index"), compact("items"));
    }

    public function show(Message $message)
    {
        $this->service->messageRead($message);
        return view(themeView("admin", "{$this->service->folder()}.show"), compact("message"));
    }

    public function reply(Message $message)
    {
        return view(themeView("admin", "{$this->service->folder()}.reply"), compact("message"));
    }

    public function sendReply(ReplyMessageRequest $request, Message $message)
    {
        try {
            $this->service->sendReply($request, $message);
            return redirect()
                ->route("admin.{$this->service->route()}.index")
                ->withSuccess(__("admin/{$this->service->folder()}.send_success"));
        } catch (Throwable $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withError(__("admin/{$this->service->folder()}.send_error"));
        }
    }

    public function destroy(Message $message)
    {
        try {
            $this->service->delete($message);
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
