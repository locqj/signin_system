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
    	$wechat_user = session('wechat_user');
    	//return $wechat_user;
    	return $wechat_user['id'];
    	return $wechat_user['nickname'];
    	return $wechat_user['avatar'];
        //return view('index.index');
    }

    public function preIndex()
    {

    }
}
