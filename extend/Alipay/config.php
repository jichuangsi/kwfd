<?php
$http_type = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https')) ? 'https://' : 'http://';
//echo $http_type . $_SERVER['HTTP_HOST'];
$config = array (	
		//应用ID,您的APPID。
		'app_id' => modC('ALIPAY_APPID','','Config'),

		//商户私钥
		'merchant_private_key' => modC('ALIPAY_PRIVATE_KEY','','Config'),
		
		//异步通知地址
		'notify_url' => $http_type . $_SERVER['HTTP_HOST']."/".str_replace("?s=","",U('/'))."Payoff/Alipay/notifyurl.html",

		//同步跳转
		'return_url' =>  $http_type . $_SERVER['HTTP_HOST']."/".str_replace("?s=","",U('/'))."Payoff/Alipay/returnurl.html",

		//编码格式
		'charset' => "UTF-8",

		//签名方式
		'sign_type'=>"RSA2",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。切记不要点击 查看应用公钥 要点击查看支付宝公钥
		'alipay_public_key' => modC('ALIPAY_PUBLIC_KEY','','Config'),
);