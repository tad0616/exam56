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

Route::get('/', 'ExamController@index')->name('index');
Route::get('/home', 'ExamController@index')->name('home.index');
Auth::routes();

Route::get('/exam', 'ExamController@index')->name('exam.index');
Route::get('/exam/create', 'ExamController@create')->name('exam.create');
Route::post('/exam', 'ExamController@store')->name('exam.store');
Route::get('/exam/{exam}', 'ExamController@show')->name('exam.show');
Route::get('/exam/{exam}/edit', 'ExamController@edit')->name('exam.edit');

Route::post('/topic', 'TopicController@store')->name('topic.store');
