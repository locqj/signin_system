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

/*實例化day_matter*/
function matters() {
    return new App\Model\DaysMatter;
}

/*實例化moon_calculate*/
function moon() {
    return new App\Model\MoonCalculate;
}

/*實例化tag_calculate*/
function tag() {
    return new App\Model\TagCalculate;
}
/*實例化sign_log*/
function signlog() {
    return new App\Model\SignLog;
}

/*實例化clientuser*/
function clientuser() {
    return new App\Model\ClientUser;
}

Route::get('/', function () {
    return view('welcome');
});
/*後臺首頁*/
Route::get('admin/index', 'AdminIndexController@index');

/*首頁*/
Route::get('call', 'Index\IndexController@call'); //請求跳轉
Route::get('index', 'Index\IndexController@index');
/*項目進行頁面*/
Route::get('index/actions/{code}', 'Index\ActionsController@actions');
/*項目記錄*/
Route::get('index/taglog/{code}', 'Index\TagLogController@index');
/*查看項目*/
Route::get('index/listlog', function() {
	return view('index.list_log');
});
/*更多*/
Route::get('index/more', function() {
    return view('index.more');
});

/*心情設置頁*/
Route::get('index/listmoon', function() {
    return view('index.list_moon');
});
/*读物设置页*/
Route::get('index/listtag', function() {
    return view('index.list_tag');
});
/*添加項目表單頁*/
Route::get('index/addaction', function() {
	return view('index.list_create');
});
/*个人记录页*/
Route::get('index/personlog', 'Index\PersionLogController@index');

/*项目详情页*/
Route::get('index/actiondetails/{code}', 'Index\ActionsController@listDetails');

/*提交打卡項目*/
Route::post('api/index/addaction', 'Index\ActionsController@postAddAction');
Route::get('api/index/delaction', 'Index\ActionsController@postDelAction');
Route::get('api/index/listaction', 'Index\ActionsController@getListAction');
Route::get('api/index/startlist', 'Index\ActionsController@getNowActions');

Route::get('api/index/getmatter', 'Index\DaysMatterController@getDayMatters');
Route::post('api/index/addmatter', 'Index\DaysMatterController@addDayMatters');
Route::post('api/index/upmatter', 'Index\DaysMatterController@updateDayMatters');
Route::get('api/index/delmatter', 'Index\DaysMatterController@delDayMatters');


Route::post('api/index/addtag', 'Index\TagLogController@tagAdd');
Route::get('api/index/deltag', 'Index\TagLogController@tagDel');
Route::get('api/index/listtag', 'Index\TagLogController@tagList');
Route::get('api/index/listtagperson', 'Index\TagLogController@tagListPerson');
Route::post('api/index/addtaglog', 'Index\TagLogController@tagLogAdd');


Route::post('api/index/addmoon', 'Index\TagLogController@moonAdd');
Route::get('api/index/delmoon', 'Index\TagLogController@moonDel');
Route::get('api/index/listmoon', 'Index\TagLogController@moonList');
/*用戶自定義*/
Route::get('api/index/listmoonperson', 'Index\TagLogController@moonListPerson');



Route::get('api/index/personlog', 'Index\PersionLogController@getPersonLog');
Route::get('api/index/personlistlog', 'Index\PersionLogController@getLastLog');

/*授權接口wx*/
Route::get('oauth', 'OAuthController@OAuth'); //請求
Route::get('authcallback', 'OAuthController@authCallback'); //回調


Route::get('test', 'Index\PersionLogController@getPersonLog');