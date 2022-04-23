<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        Blade::if('superAdmin', function () {
            $user = auth()->user();
            return ($user->isSuperAdmin());
        });

        Blade::if('admin', function () {
            $user = auth()->user();
            return ($user->isAdmin() || $user->isSuperAdmin());
        });

        Blade::if('agent', function () {
            $user = auth()->user();
            return ($user->isAgent() || $user->isAdmin() || $user->isSuperAdmin());
        });

        Blade::if('freelancer', function () {
            $user = auth()->user();
            return ($user->isFreelancer() || $user->isAdmin() || $user->isSuperAdmin());
        });
    }
}