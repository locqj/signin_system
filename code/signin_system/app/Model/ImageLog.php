<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ImageLog extends Model
{
    protected $table = 'image_log';
    public $timestamps = false;

    public function add($img_url, $status_log)
    {	
    	$openid = session('user_id');
    	$this->openid = $openid;
    	$this->img_url = $img_url;
    	$this->status_log = $status_log;
    	if ($this->save()) {
    		return succ('success', 201);
    	}
    }

    public function del()
    {
    	$data = $this->find(rq('id'));
    	$data->status_del = 0;
    	if ($data->save()) {
    		return succ('success', 204);
    	}
    }

    public function list_index()
    {
    	$openid = session('user_id');
    	$data = $this->where('openid', $openid)
    		->where('status_del', 1)
    		->where('status_log', 1)->get();
    	return $data;
    }

    public function list_action()
    {
    	$openid = session('user_id');
    	$data = $this->where('openid', $openid)
    		->where('status_del', 1)
    		->where('status_log', 2)->get();
    	return $data;
    }

    public function get_count()
    {
    	$openid = session('user_id');
    	$index = $this->where('openid', $openid)
    		->where('status_del', 1)
    		->where('status_log', 1)->count();
    	$action = $this->where('openid', $openid)
    		->where('status_del', 1)
    		->where('status_log', 2)->count();
    	return compact('index', 'action');
    }
}
