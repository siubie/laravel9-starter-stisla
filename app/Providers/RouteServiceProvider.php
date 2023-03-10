<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/dashboard';

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')->middleware('api')->group(base_path('routes/api.php'));

            Route::middleware('web')->group(base_path('routes/web.php'));

            $this->mapWebRoutes();
            $this->mapApiRoutes();
        });
    }

    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    protected function mapApiRoutes()
    {
        foreach (glob(base_path('routes/api/*.php')) as $file) {
            Route::prefix('api')
                ->namespace($this->namespace)
                ->middleware('api')
                ->group($file);
        }
    }

    protected function mapWebRoutes()
    {
        foreach (glob(base_path('routes/web/*.php')) as $file) {
            Route::prefix('api')
                ->namespace($this->namespace)
                ->middleware('web')
                ->group($file);
        }
    }
}
