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
Route::middleware(['guest'])->group(function () {
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login')->middleware('guest');
    Route::post('/login', 'Auth\LoginController@login');
});
Route::middleware(['auth'])->group(function(){
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/',function(){
        return view('home');
    })->name('home');

    Route::get('/companies', 'CompaniesController@index');
    Route::get('/companies/create', 'CompaniesController@create');
    Route::post('/companies', 'CompaniesController@store');
    Route::get('/companies/edit/{id}', 'CompaniesController@edit');
    Route::put('/companies/{id}', 'CompaniesController@update');
    Route::delete('/companies/{id}', 'CompaniesController@delete');

    Route::get('/employees', 'EmployeesController@index');
    Route::get('/employees/create', 'EmployeesController@create');
    Route::post('/employees', 'EmployeesController@store');
    Route::get('/employees/edit/{id}', 'EmployeesController@edit');
    Route::put('/employees/{id}', 'EmployeesController@update');
    Route::delete('/employees/{id}', 'EmployeesController@delete');
});





