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
/*後臺首頁*/
Route::get('admin/index', 'AdminIndexController@index');
/*首頁*/
Route::get('index', 'Index\IndexController@index');
/*項目進行頁面*/
Route::get('index/actions', 'Index\ActionsController@index');
/*項目記錄*/
Route::get('index/taglog', 'Index\TagLogController@index');
/*查看項目*/
Route::get('index/listlog', 'Index\ActionsController@listAction');
/*添加項目*/
Route::get('index/addaction', 'Index\ActionsController@addAction');




