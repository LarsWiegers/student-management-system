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

Auth::routes();

Route::get('/registration-not-complete','Controller@registrationNotComplete')->name('registration-not-complete');
Route::get('/registration-approved/{id}','Controller@registrationAccepted')->name('registration-approved');
Route::get('/registration-denied/{id}','Controller@registrationDeniedForm')->name('registration-denied');
Route::post('/registration-denied/{id}','Controller@registrationDenied')->name('registration-denied-post');

Route::middleware(['auth', 'registration-complete'])->group(function () {
    Route::get('/','HomeController@index')->name('home');
    Route::get('/profile','HomeController@index')->name('profile');
});


