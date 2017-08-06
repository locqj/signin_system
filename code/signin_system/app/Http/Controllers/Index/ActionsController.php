<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActionsController extends Controller
{	
	/**
	 * [index 首頁]
	 * @return [type] [description]
	 */
    public function index()
    {
    	return view('index.actions');
    }

    /**
     * [listAction 打卡項目詳情]
     * @return [type] [description]
     */
    public function listAction()
    {
    	return view('index.list_log');
    }

    /**
     * [AddAction 添加打卡項目]
     */
    public function AddAction()
    {
    	return view('index.list_create');	
    }
}
