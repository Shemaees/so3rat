<?php

use Illuminate\Support\Facades\Route;
Route::group(['middleware' => 'XSS'], function () {
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admins'], function () {
        Route::get('login', [App\Http\Controllers\Dashboard\LoginController::class, 'getLogin'])->name('dashboard.login.view');
        Route::post('login', [App\Http\Controllers\Dashboard\LoginController::class, 'login'])->name('dashboard.login');
    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admins'], function () {
        Route::post('logout', [App\Http\Controllers\Dashboard\LoginController::class, 'logout'])->name('dashboard.logout');
        Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.home');
    });
});
