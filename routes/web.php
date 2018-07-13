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

Route::get('login/google', 'Auth\GoogleController@redirectToProvider')->name('log.google');
Route::get('login/google/callback', 'Auth\GoogleController@handleProviderCallback');

Route::get('login/facebook', 'Auth\FacebookController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\FacebookController@handleProviderCallback');

Route::get('login/linkedin', 'Auth\LinkedinController@redirectToProvider')->name('log.linkedin');
Route::get('login/linkedin/callback', 'Auth\LinkedinController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home','HistorialController@guardar');

Route::get('/profile', 'UsuariosController@index')->name('profile');
Route::options('/profile', 'UsuariosController@informacion');
Route::post('/profile', 'UsuariosController@actualizar');
Route::get('/profile/record', 'HistorialController@historial');



Route::get('/test', function(){
    return view('prueba');
})->name('prueba');