<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class IndexController extends Controller
{	
    public function __construct()
    {
        $this->call();
    }

	public function call()
    {
    	return Redirect::to('/oauth');
    }


    public function index()
    {	
    	$dist = $this->preIndex();
    	// $dist = true;
    	if ($dist) {
            $user = clientuser()->findDetails(session('user_id'));
            // $user = clientuser()->findDetails('xxx');
            
	        return view('index.index', compact('user'));
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
    	session(['user_id' => $openid]);
    	$dist = clientuser()->findOpenid($openid);
    	if ($dist) {
    		$data = clientuser()->add($openid, $avatar, $nickname);
    	}
    	return 1;
    }

}
