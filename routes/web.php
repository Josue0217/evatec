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
    return view('dashboard');
})->middleware('auth');

Route::resource('users', 'UserController');

Auth::routes();

Route::get('/password/{id}', 'UserController@changePasswordForm')->name('password');


Route::get('/home', 'HomeController@index')->name('home');

