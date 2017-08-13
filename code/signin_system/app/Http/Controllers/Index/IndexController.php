<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class IndexController extends Controller
{	
	public function call()
    {
    	return Redirect::to('/oauth');
    }


    public function index()
    {	
    	$dist = $this->preIndex();
    	if ($dist) {
	        return view('index.index');
    	}
    }


    /**
     * [preIndex 將微信信息保存]
     * @return [type] [description]
     */
    public function preIndex()
	{	
    	$wechat_user = session('wechat_user');
    	$openid = $wechat_user['id'];
    	$avatar = $wechat_user['avatar'];
    	$nickname = $wechat_user['nickname'];
    	$dist = clientuser()->findOpenid($openid);
    	if ($dist) {
    		$data = clientuser()->add($openid, $avatar, $nickname);
    	}
    	return 1;
    }

    public function test()
    {	
    	$openid = 'saddddddddddddddddddddddddddddddddddddasdad';
    	$dist = clientuser()->findOpenid($openid);
    	return $dist;
    }

}
