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

Route::get('admin/index', 'AdminIndexController@index');
Route::get('index', 'Index\IndexController@index');
Route::get('index/actions', 'Index\ActionsController@index');
Route::get('index/taglog', 'Index\TagLogController@index');


