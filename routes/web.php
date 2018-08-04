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
    $name = 'tad';
    $say  = '嗨！';
    return view('welcome', compact('name', 'say'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
