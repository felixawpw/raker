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



Route::middleware(['auth'])->group(function(){
	Route::resource('event', 'EventController');
	Route::get('/', 'EventController@index')->name('home');
});

Route::get('login', 'HomeController@showLogin')->name('login');
Route::post('login', 'HomeController@login')->name('do_login');
Route::post('logout', 'HomeController@logout')->name('logout');
