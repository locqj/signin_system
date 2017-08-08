<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SignActions extends Model
{
    protected $table = 'sign_actions';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Model\ClientUser', 'openid', 'openid');
    }

    public function list()
    {
    	$data = $this->where('status_del', 1)->where('openid', 'test')->get();
    	return suc($data, '200');
    }

    public function add()
    {
    	$this->code = $this->autoCreate();
    	$this->name = rq('name');
    	$this->start_time = rq('start_time');
    	$this->end_time = rq('end_time');
    	$this->time_length = rq('time_length');
    	$this->openid = 'test';
    	$this->created_at = date('Y-m-d H:m:i');
    	$this->matter_code = 'test';
    	$this->result_start = rq('result_start');
    	$this->result_end = rq('result_end');
    	if($this->save()) {
    		return succ('ok', '200');
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

    public function autoCreate()
    {
    	return 'T'.time();
    }


}
