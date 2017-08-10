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
	    $date_explode = explode('-', rq('date')); //切割时间
		$this->code = $this->autoCode();
		$this->name = rq('name');
		$this->year = $date_explode[0];
		$this->month = $date_explode[1];
		$this->day = $date_explode[2];
		$this->openid = 'xxx';
		if($this->save()) {
			return succ('success', '200');
		}
	}

	public function del()
	{
	    $data = $this->find(rq('id'));
	    $data->status_del = 0;
	    if($data->save()) {
	        return suc($data, '200');
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
		if($data->save()) {
			return succ('success', '200');
		}
	}

	protected function autoCode()
	{
		return 'D'.time().'r';
	}

}