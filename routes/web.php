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

Route::group([
    'prefix' => 'exam',
    'as'     => 'exam.',
], function () {
    Route::get('/', 'ExamController@index')->name('index');
    Route::get('/create', 'ExamController@create')->name('create');
    Route::post('', 'ExamController@store')->name('store');
    Route::get('/{exam}', 'ExamController@show')->name('show');
    Route::delete('/{exam}', 'ExamController@destroy')->name('destroy');
    Route::get('/{exam}/edit', 'ExamController@edit')->name('edit');
    Route::patch('/{exam}', 'ExamController@update')->name('update');
});

Route::group([
    'prefix' => 'topic',
    'as'     => 'topic.',
], function () {
    Route::post('/', 'TopicController@store')->name('store');
    Route::get('/{topic}/edit', 'TopicController@edit')->name('edit');
    Route::patch('/{topic}', 'TopicController@update')->name('update');
    Route::delete('/{topic}', 'TopicController@destroy')->name('destroy');
});

Route::group([
    'prefix' => 'test',
    'as'     => 'test.',
], function () {
    Route::post('/', 'TestController@store')->name('store');
    Route::get('/{test}', 'TestController@show')->name('show');
});
