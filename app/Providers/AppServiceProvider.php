<?php

namespace App\Providers;

use App\Repositories\admin\PermissionRepository;
use App\Repositories\admin\PermissonRepository;
use App\Repositories\admin\RoleRepository;
use App\Repositories\admin\UserRepository;
use App\Service\admin\PermissionService;
use App\Service\admin\RoleService;
use Illuminate\Support\ServiceProvider;
use App\Service\admin\UserService;
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

        $this->app->bind(PermissiionRepository::class, function ($app) {
            return new PermissionRepository();
        });

        $this->app->bind(PermissionService::class, function ($app) {
            return new PermissionService($app->make(PermissionRepository::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      
    }
}
