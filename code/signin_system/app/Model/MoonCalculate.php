<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoonCalculate extends Model
{
    protected $table = 'moon_calculate';
    public $timestamps = false;

    public function add()
    {
    	$this->name = rq('name');
    	$this->code = $this->autoCode();
    	if($this->save()) {
    		return succ('success', 201);
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

    public function autoCode()
    {	
    	$tag = $this->count() + 1;
    	return 'moon'.$tag;
    }
}
