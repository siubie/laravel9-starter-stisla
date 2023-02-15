<?php


namespace App\Providers;


use App\Contract\EloquentContract;
use App\Service\EloquentService;
use Illuminate\Support\ServiceProvider;

class ServicesProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(EloquentContract::class, EloquentService::class);
    }

    public function boot()
    {

    }

}
