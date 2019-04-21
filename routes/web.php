<?php

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
//
//Route::get('/', function () {
//    return view('welcome');
//});


Auth::routes();
Route::resource('appointments', 'AppointmentController');

Route::resource('clients','ClientController');




//Route::get('/', 'AppointmentController@index')->name('home');
//Route::get('/appointment/create', 'AppointmentController@create')->name('create');
//Route::get('/appointment/create', 'AppointmentController@create')->name('create');
