<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class IndexController extends Controller
{	
	public function __construct()
    {
    	header('location:http://www.locqj.top/oauth');
    }


    public function index()
    {	
    	$this->preIndex();
        return view('index.index');
    }
    /**
     * [preIndex 將微信信息保存]
     * @return [type] [description]
     */
    protected function preIndex()
    {
    	$wechat_user = session('wechat_user');
    	$dist = clientuser()->findOpenid($wechat_user['id']);
    	if ($dist) {
    		$data = clientuser()->add($wechat_user['id'], $wechat_user['avatar'], $wechat_user['nickname']);
    	}
    }
}
