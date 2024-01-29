<?php

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){


    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::group(['prefix' => 'auth', 'as' => 'auth.', 'middleware' => 'login.redirect'], function () {
            Route::controller(AuthController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('login', 'login')->name('login');
            });
        });
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {

        Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
            Route::controller(AuthController::class)->group(function () {
                Route::get('logout', 'logout')->name('logout');
            });
        });

        Route::controller(AdminHomeController::class)->group(function () {
            Route::get('', 'index')->name('index');
            Route::get('404', 'pageNotFound')->name('page.not.found');
        });

        Route::group(['prefix' => 'slider', 'as' => 'slider.'], function () {
            Route::controller(SliderController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'category', 'as' => 'category.'], function () {
            Route::controller(CategoryController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
            Route::controller(ServiceController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
            Route::controller(UserController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'faq', 'as' => 'faq.'], function () {
            Route::controller(FaqController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::controller(ContactController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::delete('delete/{id}', 'delete')->name('delete');
                Route::get('edit/{id}', 'edit')->name('edit');
                Route::put('update', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'setting', 'as' => 'setting.'], function () {
            Route::controller(SettingController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('store', 'store')->name('store');
            });
        });


    });

});

