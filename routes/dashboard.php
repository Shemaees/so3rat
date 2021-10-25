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
    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admins'], function () {
        Route::get('/users', [App\Http\Controllers\Dashboard\UserController::class, 'index'])->name('dashboard.users.index');
        Route::get('/users/permissions/{user}', [App\Http\Controllers\Dashboard\UserController::class, 'permissions'])->name('dashboard.users.permissions');
        Route::get('/non-active', [App\Http\Controllers\Dashboard\UserController::class, 'nonActive'])->name('dashboard.users.non-active');
        Route::get('/blocked', [App\Http\Controllers\Dashboard\UserController::class, 'blocked'])->name('dashboard.users.blocked');
        Route::get('/change_status/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'changeStatus'])->name('dashboard.users.change_status');
        Route::get('/users/show/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'show'])->name('dashboard.users.show');
        Route::get('/statusBlock/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'statusBlock'])->name('dashboard.users.statusBlock');
        });
    Route::group(['namespace' => 'Dashboard','prefix' => 'patient', 'middleware' => 'auth:admins'], function () {
        Route::get('/users', [App\Http\Controllers\Dashboard\UserController::class, 'index_patient'])->name('dashboard.users.index_patient');
        Route::get('/non-active', [App\Http\Controllers\Dashboard\UserController::class, 'nonActive_patient'])->name('dashboard.users.non-active_patient');
        Route::get('/blocked', [App\Http\Controllers\Dashboard\UserController::class, 'blocked_patient'])->name('dashboard.users.blocked_patient');
        Route::get('/show_patient/{id}', [App\Http\Controllers\Dashboard\UserController::class, 'show_patient'])->name('dashboard.users.show_patient');
        });
    Route::group(['namespace' => 'Dashboard','prefix' => 'Permission', 'middleware' => 'auth:admins'], function () {
        Route::get('/show', [App\Http\Controllers\Dashboard\PermissionController::class, 'index'])->name('dashboard.permissions.index');
        Route::post('/save', [App\Http\Controllers\Dashboard\PermissionController::class, 'store'])->name('dashboard.permissions.add');
        Route::get('/delete/{permission}', [App\Http\Controllers\Dashboard\PermissionController::class, 'destroy'])->name('dashboard.permissions.delete');
        Route::post('/update', [App\Http\Controllers\Dashboard\PermissionController::class, 'update'])->name('dashboard.permissions.update');
        
    });
    Route::group(['namespace' => 'Dashboard','prefix' => 'roles', 'middleware' => 'auth:admins'], function () {
        Route::get('/roles', [App\Http\Controllers\Dashboard\RoleController::class, 'index'])->name('dashboard.roles.index');
        Route::get('/show/{id}', [App\Http\Controllers\Dashboard\RoleController::class, 'show'])->name('dashboard.roles.show');
        Route::get('/edit/{id}', [App\Http\Controllers\Dashboard\RoleController::class, 'edit'])->name('dashboard.role.edit');
        Route::post('/delete/{id}', [App\Http\Controllers\Dashboard\RoleController::class, 'destroy'])->name('dashboard.role.delete');
        Route::post('/add', [App\Http\Controllers\Dashboard\RoleController::class, 'store'])->name('dashboard.roles.add');
        Route::post('/update/{role}', [App\Http\Controllers\Dashboard\RoleController::class, 'update'])->name('dashboard.role.update');
    });

    Route::group(['namespace' => 'Dashboard', 'middleware' => 'auth:admins'], function () {
        Route::get('/requests', [App\Http\Controllers\Dashboard\PatientRequestsController::class, 'index'])->name('dashboard.requests.index');
        Route::get('/requests-non-active', [App\Http\Controllers\Dashboard\PatientRequestsController::class, 'nonActive'])->name('dashboard.requests.non-active');
        Route::get('/request_change_status/{id}', [App\Http\Controllers\Dashboard\PatientRequestsController::class, 'changeStatus'])->name('dashboard.requests.change_status');
        Route::get('/request_show/{id}', [App\Http\Controllers\Dashboard\PatientRequestsController::class, 'show'])->name('dashboard.requests.show');
        });

});
