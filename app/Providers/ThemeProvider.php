<?php

namespace App\Providers;

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
        view()->composer(["layout.*", "admin.setting.asset"], function ($view) {
            $assets = cache()->rememberForever('theme_assets', function () {
                $assetData = \App\Models\ThemeAsset::all();
                $response = \App\Services\Admin\SettingService::getThemeAssets();
                foreach ($assetData as $asset) {
                    $response->{$asset->name} = $asset->getFirstMediaUrl($asset->name);
                }
                return $response;
            });
            $view->with('themeAsset', $assets);
        });
    }
}
