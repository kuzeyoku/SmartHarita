<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CookieProvider extends ServiceProvider
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
        if (settings("information.cookie_notification_status", \App\Enums\StatusEnum::Passive->value) == \App\Enums\StatusEnum::Active->value) {
            $page = \App\Models\Page::find(settings("information.cookie_policy_page"));
            View::composer("layout.cookie_alert", function ($view) use ($page) {
                $cookiePolicyPageLink = $page->url ?? null;
                $view->with(compact("cookiePolicyPageLink"));
            });
        }
    }
}
