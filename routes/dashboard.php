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
Route::group(['middleware' => 'XSS'], function () {
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'guest:admins'], function () {
        Route::get('login', [App\Http\Controllers\Dashboard\LoginController::class, 'getLogin'])->name('dashboard.login.view');
        Route::post('login', [App\Http\Controllers\Dashboard\LoginController::class, 'login'])->name('dashboard.login');
    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admins'], function () {
        Route::post('logout', [App\Http\Controllers\Dashboard\LoginController::class, 'logout'])->name('dashboard.logout');
        Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.home');

        Route::group(['prefix' => 'users'], function () {
            Route::get('', [App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('dashboard.users.index');
            Route::get('non-active', [App\Http\Controllers\Dashboard\UserController::class, 'nonActive'])->name('dashboard.users.non-active');
            Route::get('blocked', [App\Http\Controllers\Dashboard\UserController::class, 'blocked'])->name('dashboard.users.blocked');
            Route::get('{user}/changeStatus', [App\Http\Controllers\Dashboard\UserController::class, 'changeStatus'])->name('dashboard.users.change_status');
            Route::get('{user}/status/block', [App\Http\Controllers\Dashboard\UserController::class, 'statusBlock'])->name('dashboard.users.statusBlock');
            Route::get('{user}/show', [App\Http\Controllers\Dashboard\UserController::class, 'show'])->name('dashboard.users.show');
            Route::delete('delete', [App\Http\Controllers\Dashboard\UserController::class, 'destroy'])->name('dashboard.users.delete');

        });

        Route::group(['prefix' => 'permissions'], function () {
            Route::get('', [App\Http\Controllers\Dashboard\PermissionController::class, 'index'])->name('dashboard.permissions.index');
            Route::post('store', [App\Http\Controllers\Dashboard\PermissionController::class, 'store'])->name('dashboard.permissions.add');

        });

        Route::group(['prefix' => 'roles'], function () {
            Route::get('', [App\Http\Controllers\Dashboard\RoleController::class, 'index'])->name('dashboard.roles.index');
            Route::get('{role}/show', [App\Http\Controllers\Dashboard\RoleController::class, 'show'])->name('dashboard.roles.show');
            Route::get('{role}/edit', [App\Http\Controllers\Dashboard\RoleController::class, 'edit'])->name('dashboard.role.edit');
            Route::patch('{role}/update', [App\Http\Controllers\Dashboard\RoleController::class, 'update'])->name('dashboard.role.update');
            Route::post('store', [App\Http\Controllers\Dashboard\RoleController::class, 'store'])->name('dashboard.roles.add');
            Route::delete('{role}/delete', [App\Http\Controllers\Dashboard\RoleController::class, 'destroy'])->name('dashboard.role.delete');

        });

        Route::group(['prefix' => 'admins'], function () {

            Route::get('', [App\Http\Controllers\Dashboard\AdminController::class, 'index'])->name('dashboard.admins.index');
            Route::get('profile', [App\Http\Controllers\Dashboard\AdminController::class, 'profile'])->name('dashboard.admins.profile');
            Route::get('trashed', [App\Http\Controllers\Dashboard\AdminController::class, 'trashed'])->name('dashboard.admins.trashed');
            Route::get('{admin}/changeStatus', [App\Http\Controllers\Dashboard\AdminController::class, 'changeStatus'])->name('admins.change_status');
            Route::get('{id}/restore', [App\Http\Controllers\Dashboard\AdminController::class, 'restore'])->name('admins.restore');
            Route::get('{admin}/changePassword', [App\Http\Controllers\Dashboard\AdminController::class, 'getPassword'])->name('dashboard.admins.change_password');
            Route::post('store', [App\Http\Controllers\Dashboard\AdminController::class, 'store'])->name('dashboard.admins.add');
            Route::post('{admin}/roles/assign', [App\Http\Controllers\Dashboard\AdminController::class, 'addRole'])->name('dashboard.admins.add_role');
            Route::post('{admin}/permissions/assign', [App\Http\Controllers\Dashboard\AdminController::class, 'addPermission'])->name('dashboard.admins.add_permission');
            Route::put('{admin}/changePassword', [App\Http\Controllers\Dashboard\AdminController::class, 'changePassword'])->name('dashboard.admins.update_password');
//                Route::put('{admin}/update', [App\Http\Controllers\Dashboard\AdminController::class, 'update'])->name('dashboard.admins.update');
            Route::delete('{admin}/delete', [App\Http\Controllers\Dashboard\AdminController::class, 'destroy'])->name('dashboard.admins.delete');
            Route::delete('{admin}/delete/force', [App\Http\Controllers\Dashboard\AdminController::class, 'forceDelete'])->name('dashboard.admins.force_delete');

        });

    });
});
