<?php

namespace Illuminate\Message;

class Messages {

	public $username = 'qich';	
	public $password = 'asdf123';
	public $apikey = '1367af07e97c1ab5a3d1062055b09442';
	public $mobile;
	public $content = [
		[
			[ "【启云微课】欢迎加入微课工厂，您的手机验证码是", "，请在30分钟内使用，超时请重新申请。" ],
			[ "【启云微课】您的手机验证码是", "，请在30分钟内使用，超时请重新申请。" ]
		],
		[
			[ "【布谷鸟】欢迎加入布谷鸟，您的手机验证码是", "，请在30分钟内使用，超时请重新申请。" ],
			[ "【布谷鸟】您的手机验证码是", "，请在30分钟内使用，超时请重新申请。" ]
		],
		[
			[ "【启云】欢迎加入启云，您的手机验证码是", "，请在30分钟内使用，超时请重新申请。" ],
			[ "【启云】您的手机验证码是", "，请在30分钟内使用，超时请重新申请。" ]
		],
	];

	public function sendSMS($code, $content)
	{
		$url = 'http://m.5c.com.cn/api/send/?';
		$data = array (
			'username' => $this -> username,
			'password' => $this -> password,
			'mobile' => $this -> mobile,
			'content' => $content,
			'apikey' => $this -> apikey,
		);
		$result = $this -> curlSMS($url, $data);
		return $result;
	}

	public function curlSMS ($url, $post_fields = array())
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_REFERER, 'http://www.yourdomain.com');
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
		$data = curl_exec($ch);
		curl_close($ch);
		$res = explode("\r\n\r\n", $data);
		return $res[2]; 
	}

}