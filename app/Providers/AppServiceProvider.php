<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;
use App\Http\Middleware\NoCache;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register alias for NoCache middleware
        $this->app->make(Router::class)->aliasMiddleware('nocache', NoCache::class);
    }
}
