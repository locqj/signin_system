<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class IndexController extends Controller
{
	public function __construct()
    {
    	return Redirect::to('/oauth/index');
    }

    public function index()
    {
    	return session('wechat_user');
        //return view('index.index');

    }
}
