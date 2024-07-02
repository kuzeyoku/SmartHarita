<?php

namespace App\Providers;

use App\Enums\StatusEnum;
use App\Models\Popup;
use Illuminate\Support\Facades\Schema;
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
        view()->composer("layout.popup", function ($view) {
            $popupModel = new Popup();
            if (Schema::hasTable($popupModel->getTable())) {
                $popup = Popup::whereStatus(StatusEnum::Active->value)->first();
            } else {
                $popup = null;
            }
            $view->with("popup", $popup);
        });
    }
}
