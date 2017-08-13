<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagLogController extends IndexController
{
    public function index($code)
    {	
    	return view('index.tag_log', compact('code'));
    }

    public function tagLogAdd()
    {
        $update_tag = signlog()->upStatusTag();
        if ($update_tag['code'] == 201) {
            $time = explode('-', date('Y-m-d', strtotime("-1 day"))); //獲取昨天時間
            $get_status_log = signlog()->getStatusLog($time[0], $time[1], $time[2]);
            if ($get_status_log['status'] == 1) {
                if($get_status_log['data'] == null) {
                    $get_status_log['data'] = 0;
                }
                $status_log = $get_status_log['data'] + 1;
                $data = signlog()->add($status_log);
                return $data;
            }
        }
    }

    /**
     * [moonList 獲取心情]
     * @return [type] [description]
     */
    public function moonList()
    {
        $data = moon()->list();
        $list = array();
        foreach ($data as $key => $value) {
            $list[$key]['value'] = $value->code;
            $list[$key]['text'] = $value->name;
        }
        return suc($list, 200);
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
     * [tagList 獲取讀物]
     * @return [type] [description]
     */
    public function tagList()
    {
        $data = tag()->list();
        $list = array();
        foreach ($data as $key => $value) {
            $list[$key]['value'] = $value->code;
            $list[$key]['text'] = $value->name;
        }
        return suc($list, 200);
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
