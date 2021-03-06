<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->resource('appointments', 'ApiAppointmentController');
Route::middleware('auth:api')->resource('pets', 'ApiPetsController');
Route::middleware('auth:api')->resource('clients', 'ApiClientsController');
Route::get('/', 'ApiUsersController@index');

//Route::get('/appointments','AppointmentController@index');
//Route::middleware('auth:api')->get('/appointments','AppointmentController@index');
//Route::middleware('auth:api')->get('/appointments/create','AppointmentController@create');

