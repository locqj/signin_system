<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set("Asia/Shanghai"); 

class SignLog extends Model
{
    protected $table = 'sign_log';
    public $timestamps = false;
    protected $openid = session('user_id');

    public function add($status_log)
    {   
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
        } else {
            return err('系統錯誤！', 400);
        }
    }
    /**
     * [upStatusTag 更新標記狀態]
     * @return [type] [description]
     */
    public function upStatusTag()
    {   
        $dist = $this->where('openid', $openid)->where('status_tag', 1)->exists();
        if ($dist) {
            $data = $this->where('openid', $openid)->where('status_tag', 1)->update(['status_tag' => 0]);
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
        $data = $this->where('year', $year)
            ->where('month', $month)->where('openid', $openid)
            ->where('day', $day)->first();
        if ($data) {
            return suc($data->status_log, 200);
        } else {
            return suc('0', 200);
        }
    }


    public function action()
    {
        return hasOne('App\Model\SignActions', 'code', 'action_code');
    }

    public function tag()
    {
        return hasOne('App\Model\TagCalculate', 'code', 'tag_code');
    }


    public function moon()
    {
        return hasOne('App\Model\MoonCalculate', 'code', 'moon_code');
    }

    public function user()
    {
        return hasOne('App\Model\ClientUser', 'openid', 'openid');
    }
}
