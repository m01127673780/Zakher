<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'auth:member'], function () {
    Auth::routes();


});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'localize']
    ],

    function () {
        Route::get('/user/{id}', 'MemberController@show')->middleware('auth:member')->name('showMember');
        Route::get('/user/{id}/editProfile', 'MemberController@edit')->middleware('auth:member')->name('editMember');
        Route::put('/user/{id}/editProfile', 'MemberController@update')->middleware('auth:member')->name('updateMember');
        Route::patch('/user/{id}/editProfile', 'MemberController@updateContactInfo')->middleware('auth:member')->name('updateContactInfo');

        Route::get('/', 'HomeController@index')->name('index');

        Route::get('/Designs/{slug}', 'PagesController@designs')->name('Designs');
        Route::get('/Designs/{id}/{slug}', 'PagesController@singleDesign')->name('singleDesign');

        //Route::get(LaravelLocalization::transRoute('routes.designs'), 'PagesController@designs')->name('Designs');
        //Route::get(LaravelLocalization::transRoute('routes.designs.show'), 'PagesController@singleDesign')->name('singleDesign');
        Route::post('/loadmore/load_data/{id}', 'PagesController@load_data')->name('loadmore.load_data');
        Auth::routes();

        //Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
        Route::get('/login/member', 'Auth\LoginController@showMemberLoginForm')->name('memberAuth.login');
        //Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
        Route::get('/register/member', 'Auth\RegisterController@showMemberRegisterForm')->name('memberAuth.register');

        //Route::post('/login/admin', 'Auth\LoginController@adminLogin');
        Route::post('/login/member', 'Auth\LoginController@memberLogin')->name('memberAuth.loginForm');
        //Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
        Route::post('/register/member', 'Auth\RegisterController@createMember')->name('memberAuth.register');



       // Route::get('/redirect', 'SocialAuthFacebookController@redirect');
      // Route::get('/callback', 'SocialAuthFacebookController@callback');
    }
);




