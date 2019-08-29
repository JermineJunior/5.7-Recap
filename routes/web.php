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

Route::get('/home', 'HomeController@index')->name('home');

// projects routes
Route::resource('project', 'ProjectController')->except('create');
//task routes
Route::post('/project/{project}/task','ProjectTasksController@store');
Route::patch('/task/{task}', 'ProjectTasksController@update');
Auth::routes();

