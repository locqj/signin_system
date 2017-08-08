<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class ActionsController extends Controller
{	
	

    

    

    /**
     * [postAddAction 添加打卡項目api]
     * @return [type] [description]
     */
    public function postAddAction()
    {
        $data = actions()->add();
        return $data;
    }
    /**
     * [postDelAction 刪除打卡項目api]
     * @return [type] [description]
     */
    public function postDelAction()
    {
        $data = actions()->del();
        return $data;
    }

    public function getListAction()
    {
        $data = actions()->list();
        return $data;
    }

    

}