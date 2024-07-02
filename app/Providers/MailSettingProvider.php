<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MailSettingProvider extends ServiceProvider
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
        foreach (settings("smtp", []) as $key => $value) {
            config(["mail.mailers.smtp.{$key}" => $value]);
        }
    }
}
