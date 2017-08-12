<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TagCalculate extends Model
{
    protected $table = 'tag_calculate';
    public $timestamps = false;


     public function add()
    {   
        $dist = $this
            ->where('name', rq('name'))
            ->where('status_del', 1)->exists();
        if (!$dist) {
        	$this->name = rq('name');
        	$this->code = $this->autoCode();
        	if($this->save()) {
        		return succ('success', 201);
        	}
        } else {
            return err('該讀物重復！', 400);
        }
    }

    public function del()
    {
    	$data = $this->find(rq('id'));
    	$data->status_del = 0;
    	if($data->save()) {
    		return succ('success', 201);
    	}

    }

    public function list()
    {
        return $this->where('status_del', 1)->get();
    }

    public function autoCode()
    {	
    	$tag = $this->count() + 1;
    	return 'tag'.$tag;
    }



}
