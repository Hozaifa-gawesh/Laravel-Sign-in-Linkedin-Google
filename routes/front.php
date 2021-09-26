<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'HomeController@index');

// Auth Drivers Route
Route::group(['namespace' => 'Auth'], function () {
    Route::get('auth/{driver}', 'DriverAuthController@sendRequestDriver')->name('login.driver');
    Route::get('callback/{driver}', 'DriverAuthController@handleCallback');
});

// Auth Route
Auth::routes(['verify' => true]);
