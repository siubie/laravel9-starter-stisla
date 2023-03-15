<?php

namespace App\Providers;

use App\Contract\AuthContract;
use App\Service\AuthService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(AuthContract::class, AuthService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        RateLimiter::for("login", function () {
            Limit::perMinute(5);
        });
        Paginator::useBootstrap();
        JsonResource::withoutWrapping();
    }
}
