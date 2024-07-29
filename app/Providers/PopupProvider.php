<?php

namespace App\Providers;

use App\Enums\StatusEnum;
use App\Models\Popup;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class PopupProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("common.popup", function ($view) {
            $popup = Cache::remember("popup", 60 * 60 * 24, function () {
                return Popup::whereStatus(StatusEnum::Active->value)->first();
            });
            $view->with(compact("popup"));
        });
    }
}
