<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set("Asia/Shanghai"); 

class SignLog extends Model
{
    protected $table = 'sign_log';
    public $timestamps = false;

    public function add($status_log)
    {   
        $openid = session('user_id');
        $this->openid = $openid;
        $this->tag_code = rq('tag_code');
        $this->moon_code = rq('moon_code');
        $this->action_code = rq('action_code');
        $time = explode('-', date('Y-m-d'));
        $this->year = $time[0];
        $this->month = $time[1];
        $this->day = $time[2];
        $this->status_log = $status_log;
        $this->status_tag = 1;
        $this->created_at = date('Y-m-d H:i:s');
        if ($this->save()) {
            return succ('success', 201);
        }
    }
    /**
     * [upStatusTag 更新標記狀態]
     * @return [type] [description]
     */
    public function upStatusTag()
    {   
        $openid = session('user_id');
        $dist = $this->where('openid', $openid)->where('status_tag', 1)->exists();
        if ($dist) {
            $data = $this->where('openid', $openid)
                ->where('status_tag', 1)->update(['status_tag' => 0]);
        }
            return succ('success', 201);
    }

    /**
     * [getStatusLog 獲取前一次的status_log]
     * @param  [type] $year  [description]
     * @param  [type] $month [description]
     * @param  [type] $day   [description]
     * @return [type]        [description]
     */
    public function getStatusLog($year, $month, $day)
    {   
        $openid = session('user_id');
        
        $data = $this->where('year', $year)
            ->where('month', $month)->where('openid', $openid)
            ->where('day', $day)->first();
        if ($data) {
            return suc($data->status_log, 200);
        } else {
            return suc('0', 200);
        }
    }

    /*获取用户最大连击*/
    public function getUserTag()
    {   
        $openid = session('user_id');
        
        $data = $this->where('openid', $openid)->where('status_log', 1)->first();
        $data = $data->status_tag;
        return $data;
    }

    /*获取用户总打卡数*/
    public function getUserCount()
    {
        $openid = session('user_id');
        
        $data = $this->where('openid', $openid)->count();
        return $data;
    }

    /*获取用户每天的打卡统计*/
    public function getUserDayCount($year, $month, $day)
    {
        $openid = session('user_id');
        
        $data = $this->where('openid', $openid)
            ->where('year', $year)
            ->where('month', $month)
            ->where('day', $day)->count();
        return $data;
    }

    /*获取用户近十条数据*/
    public function listUserLimit()
    {   
        $openid = session('user_id');
        
        $data = $this->where('openid', $openid)
            ->groupBy('year', 'month', 'day')->limit(10)->get();
        return $data;   
    }

    public function listUserLimitLast()
    {
        $openid = session('user_id');
        
        $data = $this->where('openid', $openid)
            ->orderBy('id', 'desc')->with('action', 'tag', 'moon')->limit(10)->get();
        return $data;   
    }

    public function action()
    {
        return $this->hasOne('App\Model\SignActions', 'code', 'action_code');
    }

    public function tag()
    {
        return $this->hasOne('App\Model\TagCalculate', 'code', 'tag_code');
    }


    public function moon()
    {
        return $this->hasOne('App\Model\MoonCalculate', 'code', 'moon_code');
    }

    public function user()
    {
        return $this->hasOne('App\Model\ClientUser', 'openid', 'openid');
    }
}
