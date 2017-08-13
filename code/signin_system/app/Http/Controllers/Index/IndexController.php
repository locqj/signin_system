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
    	return session('wechat_user');
        //return view('index.index');

    }
}
