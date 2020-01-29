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
    return view('frontpage');
})->name('frontpage');

// AUTH ROUTES
Auth::routes();

// ADMIN ROUTES
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
Route::post('/login/admin', 'Auth\LoginController@adminLogin');
Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
Route::get('/admin', 'Auth\AdminController@index')->name('admin');

// USER ROUTES
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/activity', 'ActivityController@index')->name('activity');
Route::get('/inflict', 'InflictController@index')->name('inflict.index');

// Supervisor
Route::post('/supervisor', 'SupervisorController@store')->name('supervisor.store');

//Dynamic supervisor call
Route::get('/supervisors/get/{id}', 'HomeController@getSupervisors');

//Save a MiniCEX to the database
Route::post('/minicex', 'StoreMiniCEXController@store')->name('minicex.store');
