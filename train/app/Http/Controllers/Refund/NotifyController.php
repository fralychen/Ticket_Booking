<?php

namespace App\Http\Controllers\Refund;

use Example\TestNotify;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Payment\Common\PayException;
use Payment\Config;
use Payment\NotifyContext;

class NotifyController extends Controller
{
    const REFUND_WAIT = 0;
    const REDUND_SUCCESS = 1;

    public function index()
    {
        $aliconfig = [
            'partner' => config('app.'),// 请填写自己的支付宝账号信息
            'md5_key' => 'xxxxxxx',// 此密码无效，请填写自己对应设置的值
            'rsa_private_key' => dirname(__FILE__) . DIRECTORY_SEPARATOR . 'rsa_private_key.pem',
            "notify_url" => 'http://test.helei.com/pay-notify.html',
            "return_url" => 'http://test.helei.com/return-url.html',
            "time_expire" => '14',

            // 转款接口，必须配置以下两项
            'account' => 'xxxxxxx@126.com',
            'account_name' => 'xxxxxxxxxxxx',
        ];

        $notify = new NotifyContext();


        // 客户端的业务逻辑类。处理如：订单更新
        $callback = new TestNotify();

        try {

            $notify->initNotify(Config::ALI, $aliconfig);
            $notify->notify($callback);

        } catch (PayException $e) {
            echo $e->errorMessage();
            exit;
        }

    }

}
