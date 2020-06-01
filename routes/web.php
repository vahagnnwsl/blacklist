<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index');
Route::get('service', 'HomeController@service')->name('service');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/register/{type}', 'Auth\RegisterController@showRegistrationForm')->name('registration');
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


// no_admin_user Routes...

Route::group(['middleware' => ['auth', 'verified', 'can:no_admin_user']], function () {
    Route::group(['prefix' => 'account'], function () {
        Route::get('/', 'AccountController@index')->name('account.index');
        Route::get('/profile', 'AccountController@profile')->name('account.profile');
        Route::post('/data/{method}', 'AccountController@updateData');
        Route::post('/password', 'AccountController@updatePassword');

        Route::group(['prefix' => 'arendators'], function () {
            Route::post('/', 'ArendatorController@store');
            Route::get('/', 'ArendatorController@index');
            Route::get('/search', 'ArendatorController@search');
            Route::post('/{id}/violation/{violation_id}', 'ArendatorController@updateViolationStatus');
            Route::get('/{id}', 'ArendatorController@getSingle');

        });

        Route::group(['prefix' => 'violations'], function () {
            Route::post('/{id}', 'ViolationController@update');
            Route::post('/{arendator_id}/store', 'ViolationController@store');

        });
    });
});

// admin_user Routes...

Route::group(['middleware' => ['auth', 'verified', 'can:admin_user'], 'prefix' => 'dashboard'], function () {

    Route::get('/', 'Admin\UserController@index');
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/arendators', 'Admin\ArendatorController');
    Route::resource('/pages', 'Admin\PageController');
    Route::resource('/clients', 'Admin\ClientController');
    Route::get('/clients/{id}/token', 'Admin\ClientController@generateNewToken')->name('clients.token');
    Route::resource('/arendators-violations', 'Admin\ArendatorViolationController');

});
