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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'TaskController@index')->name('home');
Route::get('/task/create/', 'TaskController@create')->name('create');
Route::post('/task/store/', 'TaskController@store')->name('store');
Route::get('/task/edit/{id}', 'TaskController@edit')->name('task.edit');
Route::post('/task/update/', 'TaskController@update')->name('task.update');
Route::get('/task/delete/{id}', 'TaskController@destroy')->name('task.delete');
Route::get('/task/show/{id}', 'TaskController@show')->name('task.show');

Auth::routes();
