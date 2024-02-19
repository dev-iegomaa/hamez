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
        $this->app->bind(
            'App\Http\Interfaces\Admin\AdminBookInterface',
            'App\Http\Repositories\Admin\AdminBookRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\Admin\ServicesTermsInterface',
            'App\Http\Repositories\Admin\ServicesTermsRepository'
        );

        /***
         *
         * ---------------
         * USER --- ROUTES
         * ---------------
         *
         */
        $this->app->bind(
            'App\Http\Interfaces\EndUser\AboutInterface',
            'App\Http\Repositories\EndUser\AboutRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\ContactInterface',
            'App\Http\Repositories\EndUser\ContactRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\BookInterface',
            'App\Http\Repositories\EndUser\BookRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\HomeInterface',
            'App\Http\Repositories\EndUser\HomeRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\ServiceInterface',
            'App\Http\Repositories\EndUser\ServiceRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\EndUser\ServicesTermsInterface',
            'App\Http\Repositories\EndUser\ServicesTermsRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
