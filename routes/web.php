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

Route::get('/', 'DefaultController@index')->name('default');

Auth::routes();

Route::get('/profile', 'ProfileController@index')->name('profile');

Route::post('/profile/gallery','GalleryController@store');
Route::patch('/profile/gallery/{id}','GalleryController@update');
Route::resource('/profile/gallery','GalleryController');

Route::get('/profile/gallery/photos','PhotoController@index');
Route::post('/profile/gallery/photos','PhotoController@store');
Route::post('/profile/gallery/photos','PhotoController@store');
Route::resource('profile/gallery/photos','PhotoController');

Route::get('/profile/setting/', 'UserController@show')->name('users.show');
Route::patch('/profile/setting/{id}', 'UserController@update')->name('users.update');