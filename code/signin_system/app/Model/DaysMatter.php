<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set("Asia/Shanghai"); 
class DaysMatter extends Model
{
    protected $table = 'days_matter';
    public $timestamps = false;

	public function add()
	{	
		$openid = session('user_id');
	    $date_explode = explode('-', rq('date')); //切割时间
		$this->code = $this->autoCode();
		$this->name = rq('name');
		$this->year = $date_explode[0];
		$this->month = $date_explode[1];
		$this->day = $date_explode[2];
		$this->openid = $openid;
		if ($this->save()) {
			return succ('success', 200);
		}
	}

	public function del()
	{
	    $data = $this->find(rq('id'));
	    $data->status_del = 0;
	    if ($data->save()) {
	        return suc($data, 204);
	    }
	}

	public function renew()
	{	
	    $date_explode = explode('-', rq('date')); //切割时间
		$data = $this->find(rq('id'));
		$data->name = rq('name');
		$this->year = $date_explode[0];
		$this->month = $date_explode[1];
		$this->day = $date_explode[2];
		if ($data->save()) {
			return succ('success', 200);
		}
	}

	protected function autoCode()
	{
		return 'D'.time().'r';
	}

	public function getDaysMatter($year, $month, $day)
	{
		$now = time();
    	$make_time = mktime(0, 0, 0, $month, $day, $year);
    	$make_time = floor((($make_time - $now))/86400);
    	return $make_time + 1;
	}

}