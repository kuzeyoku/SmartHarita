<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Service;
use App\Enums\StatusEnum;
use Illuminate\Support\ServiceProvider;

class MenuProvider extends ServiceProvider
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
        $cache = cache();
        $cacheTime = settings("caching.time", 3600);

        view()->composer("layout.footer", function ($view) use ($cache, $cacheTime) {

            $informationPages = settings("information");
            if ($informationPages) {
                unset($informationPages["cookie_notification_status"]);
                $pages = $cache->remember("footerInformationPages_" . app()->getLocale(), $cacheTime, function () use ($informationPages) {
                    foreach ($informationPages as $key => $value) {
                        if ($value)
                            $page[$key] = Page::findOrFail($value);
                    }
                    return $page ?? [];
                });
            } else {
                $pages = [];
            }

            $services = $cache->remember("footerServices_" . app()->getLocale(), $cacheTime, function () {
                return Service::whereStatus(StatusEnum::Active->value)->limit(6)->get();
            });

            $view->with(compact("pages", "services"));
        });

        view()->composer("layout.header", function ($view) use ($cache, $cacheTime) {
            $headerMenu = $cache->remember("headerMenu_" . app()->getLocale(), $cacheTime, function () {
                return Menu::order()->get();
            });
            $view->with(compact("headerMenu"));
        });

        // view()->composer("layout.topbar", function ($view) use ($cache, $cacheTime) {
        //     $languageList = $cache->remember("frontLanguageList", $cacheTime, function () {
        //         $language = new \App\Models\Language();
        //         return $language->active()->pluck("title", "code");
        //     });
        //     $view->with(compact("languageList"));
        // });
    }
}
