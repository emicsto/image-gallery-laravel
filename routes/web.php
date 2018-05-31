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
//
//Route::get('/', function () {
//    return view('app');
//});

use App\Http\Controllers\ImageController;

Route::get('/', 'ImageController@index')->name('home');
Route::get('/images/create', 'ImageController@create')->name('images.create');
Route::post('/images', 'ImageController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
