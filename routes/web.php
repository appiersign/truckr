<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Text Driver Route
Route::get('users/verify', 'Auth\RegisterController@verifyMobile')->name('users.verify');
Route::post('code.send', 'Auth\RegisterController@sendVerificationCode')->name('code.send');
Route::post('code.verify', 'Auth\RegisterController@verify')->name('code.verify');

// Generated Routes
Route::resource('drivers', 'DriverController');
Route::resource('loaders', 'LoaderController');
Route::resource('owners', 'OwnerController');
Route::resource('locations', 'LocationController');
Route::resource('messages', 'MessageController');
Route::resource('trackers', 'TrackerController');
Route::resource('trips', 'TripController');
Route::resource('trucks', 'TruckController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('dashboard', function(){
    return view('layouts.dashboard');
});
