<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/define', 'App\Http\Controllers\DefineController@search')->name("define.search");
Route::get('/add', 'App\Http\Controllers\DefineController@add')->name("define.add");

Route::middleware('auth')->group(function () {

	Route::post('/add', 'App\Http\Controllers\DefineController@add_post')->name("define.add_post");

	Route::get('/update/{id}', 'App\Http\Controllers\DefineController@edit')->name("define.edit");
	Route::put('/update/{id}', 'App\Http\Controllers\DefineController@update')->name("define.update");
	Route::delete('/delete/{id}', 'App\Http\Controllers\DefineController@delete')->name("define.delete");
});


Route::middleware('admin')->group(function () {

	Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
	Route::get('/admin/words', 'App\Http\Controllers\Admin\AdminWordController@index')->name("admin.word.index");
	Route::post('/admin/words/store', 'App\Http\Controllers\Admin\AdminWordController@store')->name("admin.word.store");

	Route::delete('/admin/words/{id}/delete', 'App\Http\Controllers\Admin\AdminWordController@delete')->name("admin.word.delete");
	Route::get('/admin/word/{id}/edit', 'App\Http\Controllers\Admin\AdminWordController@edit')->name("admin.word.edit");
	Route::put('/admin/word/{id}/update', 'App\Http\Controllers\Admin\AdminWordController@update')->name("admin.word.update");
});


Auth::routes();
