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

             // Design Ideas Routes    
             Route::resource('design_ideas', 'DesignIdeaController');
             Route::put('design_ideas/updateImage/{id}', 'DesignIdeaController@updateImage')->name('design_ideas.updateImage');  
             Route::delete('design_ideas/deleteImage/{id}', 'DesignIdeaController@deleteImage')->name('design_ideas.deleteImage'); 
             
              // Countries Routes    
            Route::resource('countries', 'CountryController');

        });
        // End of Dashboard Routes

    }
);
