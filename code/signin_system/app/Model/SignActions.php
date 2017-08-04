<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SignActions extends Model
{
    protected $table = 'sign_actions';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne('App\Model\ClientUser', 'openid', 'openid');
    }

}
