<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class IndexController extends Controller
{
	public function __construct()
    {	
    	$url = base64_encode('http://www.locqj.top/index');
    	return Redirect::to('/oauth/${url}');
    }

    public function index()
    {
    	return session('wechat_user');
        //return view('index.index');

    }
}
