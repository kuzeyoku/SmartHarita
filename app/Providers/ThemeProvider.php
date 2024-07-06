<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ThemeProvider extends ServiceProvider
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
        View::composer(["layout.*", "admin.setting.asset"], function ($view) {
            $themeAsset = Cache::rememberForever('theme_assets', function () {
                $assetData = \App\Models\ThemeAsset::all();
                $response = \App\Services\Admin\SettingService::getThemeAssets();
                foreach ($assetData as $asset) {
                    $response->{$asset->name} = $asset->getFirstMediaUrl($asset->name);
                }
                return $response;
            });
            $view->with(compact("themeAsset"));
        });
        View::composer("layout.header", function ($view) {
            $headerMenu = Cache::rememberForever("headerMenu_" . app()->getLocale(), function () {
                return \App\Models\Menu::order()->get();
            });
            $view->with(compact("headerMenu"));
        });
        View::composer('layout.footer', function ($view) {
            $quickLinks = Cache::rememberForever("quick_links", function () {
                return \App\Models\Page::where(["status" => \App\Enums\StatusEnum::Active->value, "quick_link" => \App\Enums\StatusEnum::Yes->value])->get();
            });
            $footer_services = Cache::rememberForever("footer_services", function () {
                return \App\Models\Service::whereStatus(\App\Enums\StatusEnum::Active->value)->limit(5)->get();
            });
            $view->with(compact("quickLinks", "footer_services"));
        });
    }
}
