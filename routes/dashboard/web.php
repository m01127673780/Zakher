<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],

    function () {
        // Dashboard Routes
        Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function () {
            Route::get('/', 'WelcomeController@index')->name('welcome');

            // Admins Routes    
            Route::resource('admins', 'UserController')->except(['show']);

            // Setting Routes    
            Route::resource('settings', 'SettingController');

            // Design Departments Routes    
            Route::resource('design_departments', 'DesignDepartmentController');
        });
        // End of Dashboard Routes

    }
);
