<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use EasyWeChat\Foundation\Application;

class OAuthController extends Controller
{
   	/**
	 * 发起网页授权
	 */
	public function OAuth(Request $request)
	{
		$config = [
		  	'debug'  => true,
		    'app_id' => 'wx13593832e898c5ef',
		    'secret' => 'c7884b1f999e803fb438e9b4e96b51eb',
		    'oauth' => [
				'scopes'   => ['snsapi_userinfo'],
				'callback' => '/authcallback',
			],
		];

		$app = new Application($config);
		$oauth = $app->oauth;
		// 获取用户信息
		$wechat_user = $request->session()->get('wechat_user');
		// 未登录
		if (empty($wechat_user)) {
			session(['target_url' => 'http://www.locqj.top/index']);
			return $oauth->redirect();
		} else{
			//$redirect = base64_decode($redirect.$wechat_user->id);
			header('location:http://www.locqj.top/index');
		}
	}

	/**
	 * 网页授权回调地址
	 * @return [type] [description]
	 */
	public function authCallback(Request $request)
	{
		$config = [
		  	'debug'  => false,
		    'app_id' => 'wx13593832e898c5ef',
		    'secret' => 'c7884b1f999e803fb438e9b4e96b51eb',
		];

		$app = new Application($config);
		$oauth = $app->oauth;

		// 获取 OAuth 授权结果用户信息
		$user = $oauth->user();
		// return $user;
		session(['wechat_user' => $user->toArray()]);
		$value = $request->session()->get('wechat_user');
		$redirect = session('target_url');
		header('location:'.$redirect); 
	}
}
