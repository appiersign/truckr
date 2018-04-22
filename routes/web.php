<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Text Driver Route
//Route::get('drivers/text', 'DriverController@text_form')->name('drivers.text');
Route::post('drivers/text', 'DriverController@text')->name('drivers.text');
Route::get('drivers/text', 'DriverController@text_form');
Route::post('drivers/verify', 'DriverController@verify')->name('drivers.verify');

// Generated Routes
Route::resource('drivers', 'DriverController');
Route::resource('loaders', 'LoaderController');
Route::resource('owners', 'OwnerController');
Route::resource('locations', 'LocationController');
Route::resource('messages', 'MessageController');
Route::resource('trackers', 'TrackerController');
Route::resource('trips', 'TripController');

Route::get('/home', 'HomeController@index')->name('home');
