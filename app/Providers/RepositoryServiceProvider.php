<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        /***
         *
         * ---------------
         * ADMIN -- ROUTES
         * ---------------
         *
         */
        $this->app->bind(
            'App\Http\Interfaces\Admin\AdminHomeInterface',
            'App\Http\Repositories\Admin\AdminHomeRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\AuthInterface',
            'App\Http\Repositories\Admin\AuthRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\CategoryInterface',
            'App\Http\Repositories\Admin\CategoryRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\ContactInterface',
            'App\Http\Repositories\Admin\ContactRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\FaqInterface',
            'App\Http\Repositories\Admin\FaqRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\ServiceInterface',
            'App\Http\Repositories\Admin\ServiceRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\SettingInterface',
            'App\Http\Repositories\Admin\SettingRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\SliderInterface',
            'App\Http\Repositories\Admin\SliderRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\UserInterface',
            'App\Http\Repositories\Admin\UserRepository'
        );

        /***
         *
         * ---------------
         * USER --- ROUTES
         * ---------------
         *
         */
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
