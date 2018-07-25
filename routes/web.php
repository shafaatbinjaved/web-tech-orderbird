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

Route::get('/', function () {
    return view('front');
});

Route::put('/lead/post','LeadsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@search');

Route::get('/home/sort/{column}/{direction}', 'HomeController@sort');

Route::get('/home/sort/{column}/{direction}/{search}', 'HomeController@sort_and_search');
