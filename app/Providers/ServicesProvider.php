<?php


namespace App\Providers;


use App\Contract\AuthContract;
use App\Contract\EloquentContract;
use App\Service\AuthService;
use App\Service\EloquentService;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(EloquentContract::class, EloquentService::class);
        $this->app->bind(AuthContract::class, AuthService::class);
    }

    public function boot()
    {

    }

}
