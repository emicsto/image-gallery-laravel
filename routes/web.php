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

Route::get('/', 'ImageController@index')->name('home');


Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', 'DashboardController@getImages')->name('images.get');
    Route::get('/admin/tags', 'DashboardController@getTags')->name('tags.get');
    Route::get('/admin/users', 'DashboardController@getUsers')->name('users.get');
    Route::get('/admin/roles', 'DashboardController@getRoles')->name('roles.get');
    Route::delete('/tags/{tag}', 'TagController@destroy')->name('tags.destroy');
    Route::delete('/users/{user}', 'UserController@destroy')->name('users.destroy');
});

Route::group(['middleware' => ['role:user|image author|admin']], function () {
    Route::get('/images/create', 'ImageController@create')->name('images.create');
    Route::post('/images', 'ImageController@store');
    Route::post('/images/{image}/comments', 'CommentController@store');
    Route::get('/tags/create', 'TagController@create')->name('tags.create');
    Route::post('/tags', 'TagController@store');
});

Route::group(['middleware' => ['can:manage,image']], function () {
    Route::get('/images/{id}/edit', 'ImageController@edit')->name('images.edit');
    Route::patch('/images/{image}', 'ImageController@update')->name('images.update');
    Route::delete('/images/{image}', 'ImageController@destroy')->name('images.destroy');
});

Route::delete('/images/{comment}/comments', 'CommentController@destroy')->name('comments.destroy')->middleware('can:manage,comment');


Route::get('/images/{id}', 'ImageController@show')->name('images.show');
Route::get('/images/tags/{tag}', 'TagController@getImages');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::redirect('/{any}', '/', 301);
