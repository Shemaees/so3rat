<?php

use Illuminate\Support\Facades\Auth;
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
        Route::post('savebooking'                       , [App\Http\Controllers\Patient\HomeController::class, 'savebooking'])->name('savebooking');
        Route::get('booking-success/{id}'               ,   [App\Http\Controllers\Patient\HomeController::class,'bookingsuccess'])->name('booking-success');
        Route::get('patient_dashboard'                  ,     [App\Http\Controllers\Patient\HomeController::class,'patient_dashboard'])->name('patient_dashboard');
        Route::get('appointments/{id}/{staues}'         , 'Doctor\AppointmentsController@change_status')->name('appointments-status');

        Route::group(['prefix' => 'patients']           , function ()
        {
            Route::get('profile-settings'              , [App\Http\Controllers\Patient\ProfileController::class,'profile_setting'])->name('profile-settings');
            Route::post('profile-settings'              , [App\Http\Controllers\Patient\ProfileController::class,'save_profile_setting'])->name('save_profile_setting');
            Route::view('chat'                          , 'front.patient.chat')->name('chat');
            Route::get('favourites'                    , [App\Http\Controllers\Patient\FavouritesController::class, 'favourites'])->name('favourites');
            Route::get('{patient}/profile/complete'     , [App\Http\Controllers\Patient\HomeController::class, 'patientProfileComplete'])->name('complete_patient_profile');
            Route::post('{patient}/profile/complete'    , [App\Http\Controllers\Patient\HomeController::class, 'patientProfileCompleteStore'])->name('complete_patient_profile');
            Route::get('check_favourite/{id}'            , [App\Http\Controllers\Patient\FavouritesController::class, 'check_favourite'])->name('check_favourite');
        });

        Route::group(['prefix' => 'doctors']            , function ()
        {
            Route::get('{doctor}/profile/complete'      , [App\Http\Controllers\Doctor\HomeController::class, 'doctorProfileComplete'])->name('complete_doctor_profile');
            Route::post('{doctor}/profile/complete'     , [App\Http\Controllers\Doctor\HomeController::class, 'doctorProfileCompleteStore'])->name('complete_doctor_profile');
        });
    });


    Route::group(['prefix' => 'doctor'          , 'middleware' => ['auth:web' ]], function () //, 'UserRoles:Doctor'
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
        Route::get('doctor-profile'            , 'Doctor\ProfileController@doctorDasboard')->name('doctor-profile');
        Route::get('doctor-profile-settings'   , 'Doctor\ProfileController@doctorProfileSettings')->name('doctor-profile-settings');
        Route::post('doctor-profile-update'   , 'Doctor\ProfileController@doctorProfileUpdate')->name('doctor-profile-update');
        //Route::view('doctor-dashboard'        , 'front.doctor.doctor-dashboard')->name('doctor-dashboard');
        Route::get('appointments'              , 'Doctor\AppointmentsController@show')->name('appointments');
        Route::view('schedule-timings'          , 'front.doctor.schedule-timings')->name('schedule-timing');
        Route::get('my-patients'               , 'doctor\HomeController@my_patients')->name('my-patients');
        Route::view('chat-doctor'               , 'front.doctor.chat-doctor')->name('chat-doctor');
        Route::view('invoices'                  , 'front.invoices.invoices')->name('invoices');
        Route::view('invoices-view'             , 'front.invoices.invoice-view')->name('invoice-view');
        Route::view('reviews'                   , 'front.doctor.reviews')->name('reviews');
        Route::view('change-password'           , 'front.auth.change-password')->name('change-password');
        Route::view('forget-password'           , 'front.auth.forget-password')->name('forget-password');
        Route::view('checkout'                  , 'front.patient.checkout')->name('checkout');
        Route::view('map-grid'                  , 'front.map.map-grid')->name('map-grid');
        Route::view('map-list'                  , 'front.map.map-list')->name('map-list');
        Route::get('patient-dashboard'          , 'doctor\HomeController@patient_dashboard')->name('patient-dashboard');
        Route::get('patient-profile/{id}'           , 'Doctor\AppointmentsController@patient_profile')->name('patient-profile');

        Route::group(['prefix'                  => 'training-requests'], function ()
        {
            Route::get('/'                                              , 'doctor\TrainingRequestsController@index')        ->name('doctor.trainingRequests.index');
            Route::get('/add'                                           , 'doctor\TrainingRequestsController@add')        ->name('doctor.trainingRequests.add');
            Route::get('/Send-Training-Request/{trainer}'               , 'doctor\TrainingRequestsController@SendRequest')        ->name('doctor.trainingRequests.SendRequest');
            Route::get('/success/{request}'                             , 'doctor\TrainingRequestsController@requestSuccess')        ->name('front.doctor.trainingRequests.success');
            Route::get('/failed'                                        , 'doctor\TrainingRequestsController@requestfailed')         ->name('front.doctor.trainingRequests.failed');
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
    Route::get('meetings'                      , 'HomeController@meetings')->name('meetings');
    Route::get('search'                        , 'HomeController@search')->name('search');
    Route::get('search_by_category/{id}'       , 'HomeController@search_by_category')->name('search_by_category');
    Route::view('cart'                          , 'front.pharmacy.cart')->name('cart');
    Route::view('contactus'                     , 'front.contactus')->name('contactus');
    Route::post('save_contactus'                , 'HomeController@save_contactus')->name('save_contactus');
    Route::view('payment-success'               , 'front.pharmacy.payment-success')->name('payment-success');
    Route::view('pharmacy-details'              , 'front.pharmacy.pharmacy-details')->name('pharmacy-details');
    Route::view('pharmacy-index'                , 'front.pharmacy.pharmacy-index')->name('pharmacy-index');
    Route::view('pharmacy-search'               , 'front.pharmacy.pharmacy-search')->name('pharmacy-search');
    Route::view('product-all'                   , 'front.product.product-all')->name('product-all');
    Route::view('product-checkout'              , 'front.product.product-checkout')->name('product-checkout');
    Route::view('product-description'           , 'front.product.product-description')->name('product-description');


});
