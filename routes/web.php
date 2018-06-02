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
Route::get('/images/{id}', 'ImageController@show')->name('images.show');
Route::delete('/images/{image}','ImageController@destroy')->name('images.destroy');
Route::get('/images/{id}/edit','ImageController@edit')->name('images.edit');
Route::patch('/images/{image}','ImageController@update')->name('images.update');

Route::post('/images/{image}/comments','CommentController@store');

Route::get('/tags/create','TagController@create')->name('tags.create');
Route::post('/tags','TagController@store');
Route::get('/images/tags/{tag}','TagController@getImages');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
