<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ClientUser extends Model
{
    protected $table = 'client_user';
    public $timestamps = false;

    /* 打卡活動關聯 */
    public function actions(){
        return $this->hasMany('App\Model\SignActions','openid','openid');
    }

    /* 籤到記錄關聯 */
    public function signlog(){
        return $this->hasMany('App\Model\SignLog','openid','openid');
    }
}
