<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes in your routes files.
     * In Laravel 8+ it's no longer applied automatically, but you can still set it
     * if you want to use relative controller names.
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Rutas API (prefijo /api, middleware api)
            Route::middleware('api')
                 ->prefix('api')
                 ->group(base_path('routes/api.php'));

            // Rutas Web (middleware web)
            Route::middleware('web')
                 ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            // 60 peticiones por minuto por IP o usuario
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
