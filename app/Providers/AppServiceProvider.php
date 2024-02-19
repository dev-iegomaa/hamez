<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        $setting = Setting::select(['email', 'phone', 'logo', 'title', 'location', 'facebook', 'whatsapp', 'instagram', 'tiktok', 'snapchat', 'opening_from', 'opening_to', 'time_from', 'time_to'])->first();
        View::share('setting', $setting);
    }
}
