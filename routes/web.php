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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('login/google', 'Auth\GoogleController@redirectToProvider');
Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');

Route::get('login/facebook', 'Auth\FacebookController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\FacebookController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');