<?php
use App\Http\Controllers\HomeController;

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
Route::post('/home/update/team', 'HomeController@update')->name('user.update');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/activity', 'ActivityController@index')->name('activity');
Route::get('/inflict', 'InflictController@index')->name('inflict.index');
// Save a MiniCEX to the database
Route::post('/minicex', 'StoreMiniCEXController@store')->name('minicex.store');

// Supervisor
Route::post('/supervisor', 'SupervisorController@store')->name('supervisor.store');
Route::post('/supervisor/status', 'SupervisorController@status')->name('supervisor.status.change');

// Department
Route::post('/department', 'DepartmentController@store')->name('department.store');
Route::post('/department/status', 'DepartmentController@status')->name('department.status.change');


//Dynamic supervisor call
Route::get('/supervisors/get/{id}', 'HomeController@getSupervisors');
Route::get('/supervisors/active/get/{id}', 'InflictController@getSupervisorActiveStatus');
Route::get('/departments/active/get/{id}', 'InflictController@getDepartmentActiveStatus');
