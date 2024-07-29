<?php

namespace App\Services\Admin;

use App\Enums\ModuleEnum;
use App\Models\ThemeAsset;
use Illuminate\Http\Request;
use stdClass;

class SettingService
{
    public function route(): string
    {
        return "setting";
    }

    public function folder(): string
    {
        return "setting";
    }

    public function update(Request $request)
    {
        if ($request->category == "asset") {
            foreach ($request->files as $key => $file) {
                if ($request->hasFile($key)) {
                    $asset = ThemeAsset::where("name", $key)->first();
                    if ($asset) {
                        $asset->clearMediaCollection($key);
                    } else {
                        $asset = ThemeAsset::create(["name" => $key]);
                    }
                    try {
                        $asset->addMediaFromRequest($key)->usingFileName($key . "." . $request->{$key}->extension())->toMediaCollection($key);
                        cache()->forget("theme_assets");
                    } catch (\Exception $e) {
                        //Exception
                    }
                }
            }
            return;
        }
        $except = $request->except("_token", "_method", "category");
        $settings = array_reduce(array_keys($except), function ($result, $key) use ($except, $request) {
            $result[$request->category . "." . $key] = $except[$key];
            if ($request->category == "social") {
                $result["social.platforms"] = array_keys(array_filter($except, function ($value) {
                    return $value;
                }));
            }
            return $result;
        }, []);
        return settings($settings);
    }

    public static function getSitemapModuleList()
    {
        $arr = ["home"];
        if (ModuleEnum::Page->status()) array_push($arr, "static_pages");
        if (ModuleEnum::Blog->status()) array_push($arr, "blog", "blog_category", "blog_detail");
        if (ModuleEnum::Service->status()) array_push($arr, "service", "service_category", "service_detail");
        if (ModuleEnum::Product->status()) array_push($arr, "product", "product_category", "product_detail");
        if (ModuleEnum::Project->status()) array_push($arr, "project", "project_category", "project_detail");
        return $arr;
    }

    public static function getChangeFreqList(): array
    {
        return [
            "always" => __("admin/setting.sitemap_changefreq_always"),
            "hourly" => __("admin/setting.sitemap_changefreq_hourly"),
            "daily" => __("admin/setting.sitemap_changefreq_daily"),
            "weekly" => __("admin/setting.sitemap_changefreq_weekly"),
            "monthly" => __("admin/setting.sitemap_changefreq_monthly"),
            "yearly" => __("admin/setting.sitemap_changefreq_yearly"),
            "never" => __("admin/setting.sitemap_changefreq_never"),
        ];
    }

    public static function getThemeAssets(): stdClass
    {
        $asset = new stdClass();
        $asset->logo_light = null;
        $asset->logo_dark = null;
        $asset->favicon = null;
        $asset->cover = null;
        $asset->breadcrumb = null;
        $asset->about1 = null;
        $asset->about2 = null;
        $asset->about3 = null;
        $asset->contact1 = null;
        $asset->contact2 = null;
        $asset->contact3 = null;
        $asset->cta = null;
        return $asset;
    }

    public static function setEmailSettings()
    {
        config([
            'mail.mailers.smtp.host' => settings("smtp.host"),
            'mail.mailers.smtp.port' => settings("smtp.port"),
            'mail.mailers.smtp.encryption' => settings("smtp.encryption"),
            'mail.mailers.smtp.username' => settings("smtp.username"),
            'mail.mailers.smtp.password' => settings("smtp.password"),
            "mail.from.address" => settings("smtp.from_address"),
            "mail.from.name" => settings("smtp.from_name"),
        ]);
    }
}
