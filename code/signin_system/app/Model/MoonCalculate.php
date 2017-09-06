<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoonCalculate extends Model
{
    protected $table = 'moon_calculate';
    public $timestamps = false;

    public function add()
    {   
        $openid = session('user_id');
        $dist = $this
            ->where('name', rq('name'))
            ->where('openid', $openid)
            ->where('status_del', 1)->exists();
        if (!$dist) {
            $this->name = rq('name');
            $this->code = $this->autoCode();
            $this->openid = session('user_id');
            if ($this->save()) {
                return succ('success', 201);
            }
        } else {
            return err('該心情已存在！', 400);
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

    public function list()
    {   
        $openid = session('user_id');
        return $this->where('status_del', 1)
            ->whereIn('openid', ['xxx', $openid])->get();
    }

    public function listUser()
    {
        $openid = session('user_id');
        $data = $this->where('status_del', 1)
            ->where('openid', $openid)->get();
        return suc($data, 200);
    }
    
    public function autoCode()
    {   
        $tag = $this->count() + 1;
        return 'moon'.$tag;
    }

}
