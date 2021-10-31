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

Route::group(['middleware' => 'XSS']                    , function ()
{
    Auth::routes();

    Route::get('/'                                      , [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::group(['middleware' => 'auth:web']           , function ()
    {
        Route::get('doctor-patient-profile/{id}'        , [App\Http\Controllers\Patient\HomeController::class, 'doctor_patient_profile'] )->name('doctor-patient-profile');
        Route::get('booking/{id}'                       , [App\Http\Controllers\Patient\HomeController::class, 'booking'])->name('booking');
        Route::get('savebooking/{id}'                   , [App\Http\Controllers\Patient\HomeController::class, 'savebooking'])->name('savebooking');
        Route::view('booking-success'                   ,    'front.booking.booking-success')->name('booking-success');
        Route::get('patient_dashboard'                  ,     [App\Http\Controllers\Patient\HomeController::class,'patient_dashboard'])->name('patient_dashboard');

        Route::group(['prefix' => 'patients']           , function ()
        {
            Route::get('{patient}/profile/complete'     , [App\Http\Controllers\Patient\HomeController::class, 'patientProfileComplete'])->name('complete_patient_profile');
            Route::post('{patient}/profile/complete'    , [App\Http\Controllers\Patient\HomeController::class, 'patientProfileCompleteStore'])->name('complete_patient_profile');
        });

        Route::group(['prefix' => 'doctors']            , function ()
        {
            Route::get('{doctor}/profile/complete'      , [App\Http\Controllers\Doctor\HomeController::class, 'doctorProfileComplete'])->name('complete_doctor_profile');
            Route::post('{doctor}/profile/complete'     , [App\Http\Controllers\Doctor\HomeController::class, 'doctorProfileCompleteStore'])->name('complete_doctor_profile');
        });
    });

    Route::group(['prefix' => 'doctor'          , 'middleware' => ['auth:web' , 'UserRoles:Doctor' ]], function ()
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
        Route::get('appointments'              , 'Doctor\AppointmentsController@show')->name('appointments');
        Route::get('appointments/{id}/{staues}'         , 'Doctor\AppointmentsController@change_status')->name('appointments-status');
        Route::view('schedule-timings'          , 'front.doctor.schedule-timings')->name('schedule-timing');
        Route::get('my-patients'               , 'doctor\HomeController@my_patients')->name('my-patients');
        Route::view('chat-doctor'               , 'front.doctor.chat-doctor')->name('chat-doctor');
        Route::view('invoices'                  , 'front.invoices.invoices')->name('invoices');
        Route::view('invoices-view'             , 'front.invoices.invoice-view')->name('invoice-view');
        Route::view('reviews'                   , 'front.doctor.reviews')->name('reviews');
        Route::view('change-password'           , 'front.auth.change-password')->name('change-password');
        Route::view('forget-password'           , 'front.auth.forget-password')->name('forget-password');
        Route::view('chat'                      , 'front.patient.chat')->name('chat');
        Route::view('checkout'                  , 'front.patient.checkout')->name('checkout');
        Route::view('favourites'                , 'front.patient.favourites')->name('favourites');
        Route::view('map-grid'                  , 'front.map.map-grid')->name('map-grid');
        Route::view('map-list'                  , 'front.map.map-list')->name('map-list');
        Route::get('patient-dashboard'          , 'doctor\HomeController@patient_dashboard')->name('patient-dashboard');
        Route::view('patient-profile'           , 'front.patient.patient-profile')->name('patient-profile');

        Route::group(['prefix'                  => 'training-requests'], function ()
        {
            Route::get('/'                                              , 'doctor\TrainingRequestsController@index')        ->name('doctor.trainingRequests.index');
            Route::get('/rejected'                                      , 'doctor\TrainingRequestsController@rejected')     ->name('doctor.trainingRequests.non-active');
            Route::get('/request_change_status/{request_id}/{status}'   , 'doctor\TrainingRequestsController@changeStatus') ->name('doctor.trainingRequests.change_status');
            Route::get('/request_show/{id}'                             , 'doctor\TrainingRequestsController@show')         ->name('doctor.trainingRequests.show');
        });

    });

    Route::view('doctor/doctor-register'           , 'front.doctor.doctor-register')->name('doctor-register');

    Route::get('/role'                           , 'doctor\HomeController@role');
    Route::get('/getRole'                        , 'doctor\HomeController@getRole');


    //Route::view('/'                           , 'front.index-3')->name('home');
    //Route::view('home'                        , 'front.index-3')->name('home');
    // Route::view('search'                        , 'front.patient.search')->name('search');
    Route::get('search'                        , 'HomeController@search')->name('search');
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
