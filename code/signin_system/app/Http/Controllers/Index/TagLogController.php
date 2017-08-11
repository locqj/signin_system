<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagLogController extends Controller
{
    public function index($code)
    {	
    	return view('index.tag_log');
    }

    /**
     * [moonAdd 心情添加]
     * @return [type] [description]
     */
    public function moonAdd()
    {
    	$data = moon()->add();
    	return $data;
    }
    /**
     * [moonDel 心情刪除]
     * @return [type] [description]
     */
    public function moonDel()
    {
    	$data = moon()->add();
    	return $data;	
    }

    /**
     * [tagAdd 讀物添加]
     * @return [type] [description]
     */
    public function tagAdd()
    {
    	$data = tag()->add();
    	return $data;
    }

    /**
     * [tagDel 讀物刪除]
     * @return [type] [description]
     */
    public function tagDel()
    {
    	$data = tag()->del();
    	return $data;
    }

}
