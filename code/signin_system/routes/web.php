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

function rq($key=null,$default=null){
    if(!$key){
        return Request::all();
    }
    return Request::get($key,$default);
}

/*返回失败api*/
function err($msg = null, $code = null){
    return ['status' => 0, 'msg' => $msg, 'code' => $code];
}

/*返回成功api*/
function suc($data_to_add = [], $code = null){
    $data = ['status' => 1, 'data' => [], 'code' => $code];
    if($data_to_add)
        $data['data'] = $data_to_add;
    return $data;
}

/*返回成功api*/
function succ($msg = null, $code = null){
    return ['status' => 1, 'msg' => $msg, 'code' => $code];
}
/*實例化sign_actions*/
function actions() {
	return new App\Model\SignActions;
}

Route::get('/', function () {
    return view('welcome');
});
/*後臺首頁*/
Route::get('admin/index', 'AdminIndexController@index');
/*首頁*/
Route::get('index', 'Index\IndexController@index');
/*項目進行頁面*/
Route::get('index/actions', function() {
	return view('index.actions');
});
/*項目記錄*/
Route::get('index/taglog', 'Index\TagLogController@index');
/*查看項目*/
Route::get('index/listlog', function() {
	return view('index.list_log');
});
/*添加項目表單頁*/
Route::get('index/addaction', function() {
	return view('index.list_create');
});

/*提交打卡項目*/
Route::post('api/index/addaction', 'Index\ActionsController@postAddAction');
/*打卡項目刪除*/
Route::post('api/index/delaction', 'Index\ActionsController@postDelAction');

Route::get('api/index/listaction', 'Index\ActionsController@getListAction');



