<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SignLog extends Model
{
    protected $table = 'sign_log';
    public $timestamps = false;

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
