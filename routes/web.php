<?php

use App\Http\Controllers\EndUser\AboutController;
use App\Http\Controllers\EndUser\BookController;
use App\Http\Controllers\EndUser\ContactController;
use App\Http\Controllers\EndUser\HomeController;
use App\Http\Controllers\EndUser\ServiceController;
use App\Http\Controllers\EndUser\ServicesTermsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
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

    Route::group(['as' => 'endUser.'], function () {
        Route::get('', [HomeController::class, 'index'])->name('index');
        Route::get('about', [AboutController::class, 'index'])->name('about');
        Route::get('service', [ServiceController::class, 'index'])->name('service');
        Route::group(['prefix' => 'book', 'as' => 'book.'], function () {
            Route::controller(BookController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('store', 'store')->name('store');
                Route::get('services/{id}', 'services')->name('services');
            });
        });

        Route::group(['prefix' => 'contact', 'as' => 'contact.'], function () {
            Route::controller(ContactController::class)->group(function () {
                Route::get('', 'index')->name('index');
                Route::post('store', 'store')->name('store');
            });
        });

        Route::get('services/terms', [ServicesTermsController::class, 'index'])->name('services.terms');
    });

});
