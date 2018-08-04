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

Route::pattern('exam', '[0-9]+');
Route::pattern('topic', '[0-9]+');
Route::pattern('test', '[0-9]+');

Route::get('/', 'ExamController@index')->name('index');
Route::get('/home', 'ExamController@index')->name('home.index');
Auth::routes();

Route::resource('exam', 'ExamController');
Route::resource('topic', 'TopicController');
Route::resource('test', 'TestController');
