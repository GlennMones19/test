<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('employee', 'App\Http\Controllers\UserController');
Route::get('/search', 'App\Http\Controllers\UserController@search')->name('users.search');

Route::get('/country-search', 'App\Http\Controllers\CountryController@search')->name('country.search');
Route::resource('country', 'App\Http\Controllers\CountryController');

Route::get('/state-search', 'App\Http\Controllers\StateController@search')->name('state.search');
Route::resource('state', 'App\Http\Controllers\StateController');

Route::get('/city-search', 'App\Http\Controllers\CityController@search')->name('city.search');
Route::resource('city', 'App\Http\Controllers\CityController');

Route::get('/department-search', 'App\Http\Controllers\DepartmentController@search')->name('department.search');
Route::resource('department', 'App\Http\Controllers\DepartmentController');
