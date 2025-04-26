<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Blade;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Register Services
        $this->app->singleton(\App\Services\BlogService::class, function ($app) {
            return new \App\Services\BlogService();
        });
    }

    public function boot(): void
    {
        // Force HTTPS in production
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        // Set default string length for MySQL older versions
        Schema::defaultStringLength(191);

        // Use Bootstrap for pagination
        Paginator::useBootstrap();

        // Strict mode for better development practices
        Model::shouldBeStrict(!$this->app->isProduction());

        // Register Blade Components
        Blade::componentNamespace('App\\View\\Components', 'app');
    }
}
