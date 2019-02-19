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

Auth::routes();

// ProjectController

Route::get('/', 'ProjectController@index')->name('project.index');
Route::get('/project/{project}', 'ProjectController@show')->name('project.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/create/project', 'ProjectController@create')->name('project.create');
    Route::post('/project/store', 'ProjectController@store')->name('project.store');
    Route::get('/project/{project}/edit', 'ProjectController@edit')->name('project.edit');
    Route::put('/project/{project}/update', 'ProjectController@update')->name('project.update');
    Route::get('/project/{project}/destroy', 'ProjectController@destroy')->name('project.destroy');
});

// TaskController

Route::middleware(['auth'])->group(function () {
    Route::post('/task/store/{project}', 'TaskController@store')->name('task.store');
    Route::get('/task/{task}', 'TaskController@show')->name('task.show');
    Route::get('/task/{task}/toggle', 'TaskController@toggle')->name('task.toggle');
    Route::get('/task/{task}/edit', 'TaskController@edit')->name('task.edit');
    Route::put('/task/{task}/update', 'TaskController@update')->name('task.update');
    Route::get('/task/{task}/destroy', 'TaskController@destroy')->name('task.destroy');
});
