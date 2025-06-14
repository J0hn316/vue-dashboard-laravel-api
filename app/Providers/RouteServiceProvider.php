<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is automatically applied to your controller routes.
     */
    public const HOME = '/';

    public function boot(): void
    {
        parent::boot();

        // Register routes with appropriate middleware
        $this->routes(function () {
            // 👇 API routes
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            // 👇 Web routes (required for Sanctum's /sanctum/csrf-cookie)
            Route::middleware('web')
                ->group(function () {
                    Route::get('/sanctum/csrf-cookie', \Laravel\Sanctum\Http\Controllers\CsrfCookieController::class . '@show');
                });
        });
    }
}
