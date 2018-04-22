<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Text Driver Route
Route::post('drivers/text', 'DriverController@text')->name('drivers.text');

// Generated Routes
Route::resource('drivers', 'DriverController');
Route::resource('loaders', 'LoaderController');
Route::resource('owners', 'OwnerController');
Route::resource('locations', 'LocationController');
Route::resource('messages', 'MessageController');
Route::resource('trackers', 'TrackerController');
Route::resource('licenses', 'LicenseController');
Route::resource('trips', 'TripController');

Route::get('/home', 'HomeController@index')->name('home');
