<?php

use Illuminate\Support\Facades\Route;

/*
These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/define', 'App\Http\Controllers\DefineController@search')->name("define.search");

Route::get('/add', 'App\Http\Controllers\DefineController@add')->name("define.add");

Route::post('/add', 'App\Http\Controllers\DefineController@add_post')->name("define.add_post");
