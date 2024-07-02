<?php

use App\Enums\ModuleEnum;
use App\Enums\StatusEnum;
use App\Http\Middleware\Maintenance;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CountVisitors;

Route::middleware(CountVisitors::class, Maintenance::class)->group(function () {
    Route::get("/", [App\Http\Controllers\HomeController::class, "index"])->name("home");

    if (settings("system.multilanguage", StatusEnum::Passive->value) == StatusEnum::Active->value) {
        Route::post("/setLocale", [App\Http\Controllers\LanguageController::class, "set"])->name("language.set");
    }

    Route::post("/newsletter", [App\Http\Controllers\NewsletterController::class, "store"])->name("newsletter.store");

    Route::get("/contact", [App\Http\Controllers\ContactController::class, "index"])->name("contact.index");

    Route::post("/contact/send", [App\Http\Controllers\ContactController::class, "send"])->name("contact.send");

    Route::get("/sitemap.xml", [App\Http\Controllers\SitemapController::class, "index"])->name("sitemap.index");

    Route::get("/page/{page}/{slug}", [App\Http\Controllers\PageController::class, "show"])->name("page.show");

    if (ModuleEnum::Blog->status()) {
        Route::controller(App\Http\Controllers\BlogController::class)->prefix("blog")->group(function () {
            Route::get("/", "index")->name("blog.index");
            Route::get("/{post}/{slug}", "show")->name("blog.show");
            Route::get("/category/{category}/{slug}", "category")->name("blog.category");
            Route::post("/{post}/comment/store", "comment_store")->name("blog.comment_store");
        });
    }

    if (ModuleEnum::Service->status()) {
        Route::controller(App\Http\Controllers\ServiceController::class)->prefix("service")->group(function () {
            Route::get("/", "index")->name("service.index");
            Route::get("/{service}/{slug}", "show")->name("service.show");
            Route::get("/{category}", "category")->name("service.category");
        });
    }

    if (ModuleEnum::Project->status()) {
        Route::controller(App\Http\Controllers\ProjectController::class)->prefix("project")->group(function () {
            Route::get("/", "index")->name("project.index");
            Route::get("/{project}/{slug}", "show")->name("project.show");
            Route::get("/{category}", "category")->name("project.category");
        });
    }
});

Route::get("maintenance", [App\Http\Controllers\MaintenanceController::class, "index"])->name("maintenance");
