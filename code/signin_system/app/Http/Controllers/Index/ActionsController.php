<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class ActionsController extends Controller
{	
	
    public function actions()
    {   
        /*判斷當前時段的哪些活動存在*/
        return view('index.actions');
    }
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

    /**
     * [getNowActions獲取當時段的項目]
     * @return [type] [description]
     */
    public function getNowActions()
    {
        $data = actions()->list_limit();
        //echo count($data['data']);
        if(count($data) == 0) {
            return $data;
        } else {
            foreach ($data as $key => $value) {
                
            }
            return $data;
        }
    }

    

}