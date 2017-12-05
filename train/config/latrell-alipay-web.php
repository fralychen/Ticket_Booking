<?php
return [

	// 安全检验码，以数字和字母组成的32位字符。
	'key' => '4lwfjs2cd135w291rzylky8vxwspcwep',

	//签名方式
	'sign_type' => 'MD5',

	// 服务器异步通知页面路径。
	'notify_url' => config('app.url') . '/payment-notify/alipay',

	// 页面跳转同步通知页面路径。
	'return_url' => config('app.url') . '/payment-return/alipay',
];
