<?php

use Illuminate\Support\Facades\Route;

/*
These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/


Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");

Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");

Route::get('/search', 'App\Http\Controllers\SearchController@index')->name("search.index");
