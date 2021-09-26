<?php

use Illuminate\Support\Facades\Route;

$prefix = 'dashboard.';

// Before Login Dashboard Routes
Route::group(['middleware' => 'guest:admin'], function () {
    $controller = 'AuthController@';
    // Route Login
    Route::get('login', $controller . 'view')->name('dashboard.login');
    Route::post('login', $controller . 'login');
});

// After Login Dashboard Routes
Route::group(['middleware' => ['auth:admin', 'history']], function () use ($prefix) {
    // Logout Route
    Route::post('logout', 'AuthController@logout')->name($prefix . 'logout');

    // Home Route
    Route::get('/', 'HomeController@index')->name(substr($prefix, 0, -1));
    Route::get('home', 'HomeController@index')->name($prefix . 'home');

    // Profile Route
    Route::group(['prefix' => 'profile'], function () use ($prefix) {
        $controller = 'ProfileController@';
        $route = $prefix . 'profile.';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1));
        Route::get('edit', $controller . 'edit')->name($route . 'edit');
        Route::post('update', $controller . 'update')->name($route . 'update');
    });

    // Setting Route
    Route::group(['prefix' => 'setting'], function () use ($prefix) {
        $controller = 'SettingController@';
        $route = $prefix . 'settings';
        Route::get('/', $controller . 'index')->name($route)->middleware('permission:read-settings');
        Route::post('/', $controller . 'update')->name($route)->middleware('permission:update-settings');
    });

    // Roles Route
    Route::group(['prefix' => 'roles'], function () {
        $controller = 'RolesController@';
        $route = 'dashboard.roles.';
        $permission = '-roles';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1))->middleware('permission:read' . $permission);
        Route::get('create', $controller . 'create')->name($route . 'create')->middleware('permission:create' . $permission);
        Route::post('store', $controller . 'store')->name($route . 'store')->middleware('permission:create' . $permission);
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit')->middleware('permission:update' . $permission);
        Route::post('{id}/update', $controller . 'update')->name($route . 'update')->middleware('permission:update' . $permission);
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete')->middleware('permission:delete' . $permission);
        Route::post('deletes', $controller . 'deletes')->name($route . 'deletes')->middleware('permission:delete' . $permission);
    });

    // Admins Route
    Route::group(['prefix' => 'admins'], function () {
        $controller = 'AdminsController@';
        $route = 'dashboard.admins.';
        $permission = '-admins';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1))->middleware('permission:read' . $permission);
        Route::get('create', $controller . 'create')->name($route . 'create')->middleware('permission:create' . $permission);
        Route::post('store', $controller . 'store')->name($route . 'store')->middleware('permission:create' . $permission);
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit')->middleware('permission:update' . $permission);
        Route::post('{id}/update', $controller . 'update')->name($route . 'update')->middleware('permission:update' . $permission);
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete')->middleware('permission:delete' . $permission);
        Route::post('deletes', $controller . 'deletes')->name($route . 'deletes')->middleware('permission:delete' . $permission);
    });


    // Users Route
    Route::group(['prefix' => 'users'], function () {
        $controller = 'UsersController@';
        $route = 'dashboard.users.';
        $permission = '-users';
        Route::get('/', $controller . 'index')->name(substr($route, 0, -1))->middleware('permission:read' . $permission);
        Route::get('{id}/edit', $controller . 'edit')->name($route . 'edit')->middleware('permission:update' . $permission);
        Route::post('{id}/update', $controller . 'update')->name($route . 'update')->middleware('permission:update' . $permission);
        Route::post('{id}/delete', $controller . 'delete')->name($route . 'delete')->middleware('permission:delete' . $permission);
        Route::post('deletes', $controller . 'deletes')->name($route . 'deletes')->middleware('permission:delete' . $permission);
    });


});
