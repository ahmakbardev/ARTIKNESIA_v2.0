<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UniversalServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        require_once app_path("Helpers/Universal.php");
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
