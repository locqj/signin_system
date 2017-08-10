<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set("Asia/Shanghai"); 
class SignActions extends Model
{
    protected $table = 'sign_actions';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Model\ClientUser', 'openid', 'openid');
    }
    /**
     * [list 當前用戶的所有項目]
     * @return [type] [description]
     */
    public function list()
    {
    	$data = $this->where('status_del', 1)->where('openid', 'xxx')->get();
    	return suc($data, 200);
    }

    /**
     * [list 當前用戶的有限期項目]
     * @return [type] [description]
     */
    public function list_limit()
    {
        $data = $this->where('status_del', 1)
            ->where('openid', 'xxx')
            ->where('status', 1)->get();
        return $data;
    }

    public function add()
    {
    	$this->code = $this->autoCode();
    	$this->name = rq('name');
        $this->openid = 'xxx'; /*test*/
    	$this->start_time = rq('start_time');
    	$this->end_time = rq('end_time');
    	$this->time_length = rq('time_length');
    	$this->created_at = date('Y-m-d H:m:i');
    	$this->matter_code = 'test';
    	$this->result_start = rq('result_start');
    	$this->result_end = rq('result_end');
        if(rq('start_time') != null && rq('end_time') != null) {
            $this->status = 1; //在設定時間內有效
        } else {
            $this->status = 2; //長期有效
        }
    	if($this->save()) {
    		return succ('ok', 201);
    	}
    }

    public function del()
    {	

        $data = $this->find(rq('id'));
        $data->status_del = 0;
        if($data->save()) {
	        return suc($data, 204);
        }

    }

    protected function autoCode()
    {
    	return 'A'.time().'N';
    }


}
