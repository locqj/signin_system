<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


date_default_timezone_set("Asia/Shanghai");

class DaysMatterController extends Controller
{	
	/**
	 * [getDayMatters 根據openid來拿]
	 * @return [type] [description]
	 */
    public function getDayMatters() 
    {
    	$openid = session('user_id');
    	$data = matters()
    		->where('openid', $openid)
			->where('status_del', 1)
			->get();
		foreach ($data as $key => $value) {
			$value->daymatter = $this->getDay($value->month, $value->day, $value->year);
            if ($value->daymatter <= 0) {
                unset($data[$key]);
            }
		}
		return suc($data, 200);

    }
    /**
     * [getDay 返回倒計時天數]
     * @param  [type] $year  [description]
     * @param  [type] $month [description]
     * @param  [type] $day   [description]
     * @return [type]        [description]
     */
    public function getDay($month, $day, $year)
    {
    	$now = time();
    	$make_time = mktime(0, 0, 0, $month, $day, $year);
    	$make_time = floor((($make_time - $now))/86400);
    	return $make_time+1;
    }

    /**
     * [addDayMatters 添加倒計時]
     */
    public function addDayMatters()
    {
    	$data = matters()->add();
    	return $data;
    }

    /**
     * [updateDayMatters 更新倒計時]
     * @return [type] [description]
     */
    public function updateDayMatters()
    {
    	$data = matters()->renew();
    	return $data;
    }

    /**
     * [delDayMatters 刪除倒計時]
     * @return [type] [description]
     */
    public function delDayMatters()
    {
    	$data = matters()->del();
    	return $data;
    }


}
