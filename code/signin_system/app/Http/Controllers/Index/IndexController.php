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
        $this->distUrl();
        $user = clientuser()->findDetails(session('user_id'));
        // $user = clientuser()->findDetails('xxx');
        $index = imagelog()->list_index();
        $count = imagelog()->get_count();
        return view('index.index', compact('user', 'index', 'count'));
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

    /**
     * [distUrl 判断路由是本地开发环境还是服务器实际应用环境]
     * @return [type] [description]
     */
    public function distUrl()
    {
        $url = $_SERVER['HTTP_HOST'];
        if ($url == 'localhost:8000') {
            session(['user_id' => 'xxx']);
        } else {
            $this->preIndex();
        }
    }

}
