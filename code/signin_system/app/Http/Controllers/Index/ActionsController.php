<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class ActionsController extends IndexController
{	
	
    public function actions($code)
    {   
        /*判斷當前時段的哪些活動存在*/
        $data = actions()->findByCode($code);
        /*根據是否有倒計時間來控制模板*/ 
        if ($data->time_length == 0) {
            $data->blade_status = 0;
        } else {
            $data->time_length *=60; //轉換爲s
            $data->blade_status = 1;

        }
        return view('index.actions', compact('data'));
    }
    /**
     * [postAddAction 添加打卡項目api]
     * @return [type] [description]
     */
    public function postAddAction()
    {   
        if (rq('start_time') != null && rq('end_time') == null) {
            return err('請填寫結束日期', 400);
        } elseif (rq('start_time') == null && rq('end_time') != null) {
            return err('請填寫開始日期', 400);
        } elseif (rq('result_start') != null && rq('result_end') == null) {
            return err('請填寫結束時間', 400);
        } elseif (rq('result_start') == null && rq('result_end') != null) {
            return err('請填寫開始時間', 400);
        } else {
            $data = actions()->add();
            return $data;
        }

    }
    /**
     * [postDelAction 刪除打卡項目api]
     * @return [type] [description]
     */
    public function postDelAction()
    {
        $data = actions()->del();
        return $data;
    }

    public function getListAction()
    {
        $data = actions()->list();
        return $data;
    }

    /**
     * [getNowActions獲取當時段的項目]
     * @return [type] [description]
     */
    public function getNowActions()
    {
        $data = actions()->list();
        if (count($data) == 0) {
            return err($data);
        } else {
            foreach ($data['data'] as $key => $value) {
                $res = $this->verifyTime($value->status, $value->start_time, $value->end_time,
                    $value->result_start, $value->result_end);
                if ($res == 'un') {
                    unset($data['data'][$key]);
                }
            }
            return $data;
        }
    }

    /**
     * [verifyTime 判斷項目在當前時間是否存在]
     * @param  [type] $status       [description]
     * @param  [type] $start_time   [description]
     * @param  [type] $end_time     [description]
     * @param  [type] $result_start [description]
     * @param  [type] $result_end   [description]
     * @return [type]               [description]
     */
    protected function verifyTime($status, $start_time, $end_time, $result_start, $result_end)
    {   
        $now_time = time();
        $now_hour_min = mktime(date('h'), date('i'), 0, 0, 0, 0);
        $start_time = explode('-', $start_time);
        $end_time = explode('-', $end_time);
        $result_start = explode(':', $result_start);
        $result_end = explode(':', $result_end);
        switch ($status) {
            /*時間日期限定*/
            case '1':
                $start_time = mktime(0, 0, 0, $start_time[1], $start_time[2], $start_time[0]);
                $end_time = mktime(0, 0, 0, $end_time[1], $end_time[2], $end_time[0]);
                $result_start = mktime($result_start[0], $result_start[1], 0, 0, 0, 0);
                $result_end = mktime($result_end[0], $result_end[1], 0, 0, 0, 0);
                if (!($now_time >= $start_time && $now_time <= $end_time)) {
                    return 'un'; //不在範圍裏面就刪除
                }
                if (!($now_hour_min >= $result_start && $now_hour_min <= $result_end)) {
                    return 'un';
                }
                break;
            /*限定日期*/
            case '2':
                $start_time = mktime(0, 0, 0, $start_time[1], $start_time[2], $start_time[0]);
                $end_time = mktime(0, 0, 0, $end_time[1], $end_time[2], $end_time[0]);
                if (!($now_time >= $start_time && $now_time <= $end_time)) {
                    return 'un'; //不在範圍裏面就刪除
                }
                break;
            /*限定時間*/
            case '3':
                $result_start = mktime($result_start[0], $result_start[1], 0, 0, 0, 0);
                $result_end = mktime($result_end[0], $result_end[1], 0, 0, 0, 0);
                if (!($now_hour_min >= $result_start && $now_hour_min <= $result_end)) {
                    return 'un';
                }
                break;
            /*長期*/
            default:
                # code...
                break;
        }
    }


    

}