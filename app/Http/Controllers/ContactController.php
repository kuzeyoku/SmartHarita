<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Enums\StatusEnum;
use App\Http\Controllers\Admin\LogController;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Services\Admin\SettingService;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function send(ContactRequest $request)
    {
        if (!recaptcha()) {
            return back()
                ->withInput()
                ->withError(__("front/general.recaptcha_error"));
        }
        try {
            Message::create([
                "name" => $request->name,
                "phone" => $request->phone,
                "email" => $request->email,
                "subject" => $request->subject,
                "message" => $request->message,
                "status" => StatusEnum::Unread->value,
                "ip" => $request->ip(),
                "user_agent" => $request->userAgent(),
                //"consent" => $request->terms
            ]);
            return back()
                ->withSuccess(__("front/contact.send_success"));
        } catch (\Exception $e) {
            LogController::logger("error", $e->getMessage());
            return back()
                ->withInput()
                ->withError(__("front/contact.send_error"));
        } finally {
            try {
                SettingService::setEmailSettings();
                Mail::to(settings("contact.email"))
                    ->send(new \App\Mail\Contact($request));
            } catch (\Exception $e) {
                LogController::logger("error", $e->getMessage());
            }
        }
    }
}
