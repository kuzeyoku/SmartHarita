<?php

namespace App\Http\Controllers;

use App\Enums\StatusEnum;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    public function index()
    {
        if (settings("maintenance.status") == StatusEnum::Active->value) {
            $date = Carbon::parse(settings("maintenance.end_date"))->format("m.d.Y");
            return view("maintenance", compact("date"));
        } else {
            return redirect()->route("home");
        }
    }
}
