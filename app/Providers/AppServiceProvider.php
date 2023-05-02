<?php

namespace App\Providers;

use App\Repositories\admin\RoleRepository;
use App\Repositories\admin\UserRepository;
use App\Service\admin\RoleService;
use Illuminate\Support\ServiceProvider;
use App\Service\admin\UserService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, function ($app) {
            return new UserRepository();
        });

        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserRepository::class));
        });

        $this->app->bind(RoleRepository::class, function ($app) {
            return new RoleRepository();
        });

        $this->app->bind(RoleService::class, function ($app) {
            return new RoleService($app->make(RoleRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
