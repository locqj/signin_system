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
    	$openid = session('user_id');
    	return $openid;
    	if ($dist) {
	        return view('index.index', compact('openid'));
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
    	session('user_id', $openid);
    	$dist = clientuser()->findOpenid($openid);
    	if ($dist) {
    		$data = clientuser()->add($openid, $avatar, $nickname);
    	}
    	return 1;
    }

}
