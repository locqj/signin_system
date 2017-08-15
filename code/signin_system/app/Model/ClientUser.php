<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
date_default_timezone_set("Asia/Shanghai");

class ClientUser extends Model
{
    protected $table = 'client_user';
    public $timestamps = false;

    public function add($openid, $head_img, $nickname)
    {
        $this->openid = $openid;
        $this->head_img = $head_img;
        $this->nickname = $nickname;
        $this->created_at = date('Y-m-d h:i:s');
        if ($this->save()) {
            return succ('success', 201);
        }
    }

    /**
     * [findOpenid 判斷數據庫是否存在該openid]
     * @param  [type] $openid [description]
     * @return [type]         [description]
     */
    public function findOpenid($openid)
    {
        $data = $this->where('openid', $openid)->exists();
        if($data) {
            return 0; //存在返回0 告訴業務層不需要add
        } else {
            return 1;
        }
    }

    /**
     * [findDetails 根据openid查找信息]
     * @param  [type] $openid [description]
     * @return [type]         [description]
     */
    public function findDetails($openid)
    {
        $data = $this->where('openid', $openid)->first();
        return $data;
    }

    /* 打卡活動關聯 */
    public function actions()
    {
        return $this->hasMany('App\Model\SignActions','openid','openid');
    }

    /* 籤到記錄關聯 */
    public function signlog()
    {
        return $this->hasMany('App\Model\SignLog','openid','openid');
    }
}
