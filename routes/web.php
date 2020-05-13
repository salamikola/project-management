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
Route::get('/project/create', 'ProjectController@create');
Route::post('/project', 'ProjectController@store');
Route::get('/project', 'ProjectController@index')->name('index');
Route::get('/project/edit', 'ProjectController@edit');
Route::get('/project/destroy', 'ProjectController@destroy');
Route::post('/project/edit/update', 'ProjectController@update');
Route::get('/project/task', 'TaskController@index');
Route::get('/project/task/create','TaskController@create');
Route::post('/project/task', 'TaskController@store');
Route::get('/project/task/edit', 'TaskController@edit');
Route::post('/project/task/edit', 'TaskController@update');
Route::get('/project/task/destroy', 'TaskController@destroy');
Route::get('/project/sidebar', 'ProjectController@sidebar');
Route::get('/admin', 'Auth\AdminLoginController@index')->name('adminIndex')->middleware('check.admin');
Route::get('/admin/login','Auth\AdminLoginController@showAdminLogin')->name('adminLogin');
Route::post('/admin', 'Auth\AdminLoginController@adminLogin');
Route::post('/admin/logout', 'Auth\AdminLoginController@logout');