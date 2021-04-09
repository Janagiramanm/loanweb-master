<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'Api\UserController@login');

Route::group([ 'middleware' => 'auth:api'], function() {
    Route::get('logout', 'Api\UserController@logout');
    Route::get('user', 'Api\UserController@user');

    Route::get('typeofappointments', 'Api\ApiController@typeOfAppointments');

    Route::post('appointments', 'Api\ApiController@newAppointments');
    
    Route::post('appointment-details', 'Api\ApiController@appointmentDetails');
    

    Route::post('submitapplication', 'Api\ApiController@submitApplication');
    Route::post('kyc-details', 'Api\ApiController@kycDetails');

    Route::get('closedappointments', 'Api\ApiController@closedAppointments');

    Route::post('save-lat-long','Api\ApiController@saveLatLong');

    Route::post('telecaller-customers','Api\UserController@telecallerCustomers');

    //Route::post('kyc-details','Api\ApiController@kycDetails');




});
