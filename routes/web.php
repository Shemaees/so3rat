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

Route::group(['middleware' => 'XSS'], function () 
{
    Auth::routes();

    Route::get('/'                  , [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => 'auth:web']   , function () 
    {

        Route::group(['prefix' => 'patients']   , function () 
        {
            Route::get('{patient}/profile/complete'     , [App\Http\Controllers\Patient\HomeController::class, 'patientProfileComplete'])->name('complete_patient_profile');
            Route::post('{patient}/profile/complete'    , [App\Http\Controllers\Patient\HomeController::class, 'patientProfileCompleteStore'])->name('complete_patient_profile');

        });

        Route::group(['prefix' => 'doctors']     , function () 
        {
            Route::get('{doctor}/profile/complete'      , [App\Http\Controllers\Doctor\HomeController::class, 'doctorProfileComplete'])->name('complete_doctor_profile');
            Route::post('{doctor}/profile/complete'     , [App\Http\Controllers\Doctor\HomeController::class, 'doctorProfileCompleteStore'])->name('complete_doctor_profile');
        });
        //    Route::post('logout', [App\Http\Controllers\Dashboard\LoginController::class, 'logout'])->name('dashboard.logout');
        //    Route::get('/', [App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard.home');
    });
    
    Route::group(['prefix' => 'doctor' , 'middleware' => ['auth:web' , 'UserRoles:Doctor' ]], function () 
    {
        Route::get('/dashboard'                 , 'HomeController@index')->name('doctor-dashboard');

        Route::view('index-slide'               , 'front.doctor.index-slide')->name('index-slide');
        Route::view('doctor-add-blog'           , 'front.doctor.doctor-add-blog')->name('doctor-add-blog');
        Route::view('doctor-blog'               , 'front.blog.doctor-blog')->name('doctor-blog');
        Route::view('blog-details'              , 'front.blog.blog-details')->name('blog-details');
        Route::view('blog-list'                 , 'front.blog.blog-list')->name('blog-list');
        Route::view('blog-grid'                 , 'front.blog.blog-grid')->name('blog-grid');
        Route::view('doctor-change-password'    , 'front.doctor.doctor-change-password')->name('doctor-change-password');
        Route::view('doctor-pending'            , 'front.doctor.doctor-pending')->name('doctor-pending');
        Route::view('doctor-profile'            , 'front.doctor.doctor-profile')->name('doctor-profile');
        Route::get('doctor-profile-settings'   , 'Doctor\ProfileController@doctorProfileSettings')->name('doctor-profile-settings');
        Route::post('doctor-profile-update'   , 'Doctor\ProfileController@doctorProfileUpdate')->name('doctor-profile-update');
        //Route::view('doctor-dashboard'        , 'front.doctor.doctor-dashboard')->name('doctor-dashboard');
        Route::view('appointments'              , 'front.doctor.appointments')->name('appointments');
        Route::view('schedule-timings'          , 'front.doctor.schedule-timings')->name('schedule-timing');
        Route::view('my-patients'               , 'front.doctor.my-patients')->name('my-patients');
        Route::view('chat-doctor'               , 'front.doctor.chat-doctor')->name('chat-doctor');
        Route::view('invoices'                  , 'front.invoices.invoices')->name('invoices');
        Route::view('invoices-view'             , 'front.invoices.invoice-view')->name('invoice-view');
        Route::view('reviews'                   , 'front.doctor.reviews')->name('reviews');
        Route::view('booking'                   , 'front.booking.booking')->name('booking');
        Route::view('booking-success'           , 'front.booking.booking-success')->name('booking-success');
        
        
        Route::view('change-password'           , 'front.auth.change-password')->name('change-password');
        //Route::view('login'                   , 'front.auth.login')->name('login');
        //Route::view('register'                , 'front.auth.register')->name('register');
        Route::view('forget-password'                           , 'front.auth.forget-password')->name('forget-password');
        
        Route::view('chat'                      , 'front.patient.chat')->name('chat');
        Route::view('checkout'                  , 'front.patient.checkout')->name('checkout');
        Route::view('doctor-profile'            , 'front.patient.doctor-profile')->name('doctor-profile');
        Route::view('favourites'                , 'front.patient.favourites')->name('favourites');
        Route::view('map-grid'                  , 'front.map.map-grid')->name('map-grid');
        Route::view('map-list'                  , 'front.map.map-list')->name('map-list');
        Route::view('patient-dashboard'         , 'front.patient.patient-dashboard')->name('patient-dashboard');
        Route::view('patient-profile'           , 'front.patient.patient-profile')->name('patient-profile');
    });
    Route::view('doctor/doctor-register'           , 'front.doctor.doctor-register')->name('doctor-register');

    Route::get('/role'                           , 'doctor\HomeController@role');
    Route::get('/getRole'                        , 'doctor\HomeController@getRole');
   

    //Route::view('/'                           , 'front.index-3')->name('home');
    //Route::view('home'                        , 'front.index-3')->name('home');
    Route::view('search'                        , 'front.patient.search')->name('search');
    Route::view('profile-settings'              , 'front.patient.profile-settings')->name('profile-settings');
    Route::view('cart'                          , 'front.pharmacy.cart')->name('cart');
    Route::view('payment-success'               , 'front.pharmacy.payment-success')->name('payment-success');
    Route::view('pharmacy-details'              , 'front.pharmacy.pharmacy-details')->name('pharmacy-details');
    Route::view('pharmacy-index'                , 'front.pharmacy.pharmacy-index')->name('pharmacy-index');
    Route::view('pharmacy-search'               , 'front.pharmacy.pharmacy-search')->name('pharmacy-search');
    Route::view('product-all'                   , 'front.product.product-all')->name('product-all');
    Route::view('product-checkout'              , 'front.product.product-checkout')->name('product-checkout');
    Route::view('product-description'           , 'front.product.product-description')->name('product-description');


});
