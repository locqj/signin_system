<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersionLogController extends Controller
{	
	/**
	 * [index 个人记录页]
	 * @return [type] [description]
	 */
    public function index()
    {	
        // $user = clientuser()->findDetails(session('user_id'));
    	$user = clientuser()->findDetails('xxx');
    	return view('index.person_log', compact('user'));
    }

    public function getPersonLog()
    {
    	$con = signlog()->getUserTag();
    	$count = signlog()->getUserCount();
    	$data = signlog()->listUserLimit();
    	$res = array();
    	foreach ($data as $key => $value) {
    		$res['date'][$key] = $value->year.'-'.$value->month.'-'.$value->day;
    		$res['date_count'][$key] = signlog()->getUserDayCount($value->year, $value->month, $value->day);
    	}
    	$res['con'] = $con; //最大连击
    	$res['count'] = $count; //总数
    	return suc(compact('res'), 200);
    }

    public function getLastLog()
    {
    	$data = signlog()->listUserLimitLast();
    	return suc($data, 200);
    }
}
