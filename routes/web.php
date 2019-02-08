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

// ProjectController

Route::get('/', 'ProjectController@index')->name('project.index');
Route::get('/project/create', 'ProjectController@create')->name('project.create');
Route::post('project/store', 'ProjectController@store')->name('project.store');
Route::get('/project/{project}', 'ProjectController@show')->name('project.show');
Route::get('/project/{project}/edit', 'ProjectController@edit')->name('project.edit');
Route::put('/project/{project}/update', 'ProjectController@update')->name('project.update');
Route::get('/project/{project}/destroy', 'ProjectController@destroy')->name('project.destroy');

// TaskController

Route::post('/task/store/{project}', 'TaskController@store')->name('task.store');
Route::get('/task/{task}', 'TaskController@show')->name('task.show');
