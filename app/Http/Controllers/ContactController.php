<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Enums\StatusEnum;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Notifications\AdminNotification;

class ContactController extends Controller
{

    public function index()
    {
        return view('contact');
    }

    public function send(ContactRequest $request)
    {
        if (!recaptcha($request)) {
            return back()
                ->withInput()
                ->withError(__("front/general.recaptcha_error"));
        }
        try {
            Mail::to(settings("contact.email"))
                ->send(new \App\Mail\Contact($request));
        } catch (\Exception $e) {
            $admins = \App\Models\User::where("role", "admin")->get();
            $admins->each(function ($admin) use ($e) {
                $admin->notify(new AdminNotification("error", __("front/contact.notify_error"), $e->getMessage()));
            });
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
            return back()
                ->withInput()
                ->withError(__("front/contact.send_error"));
        }
    }
}
