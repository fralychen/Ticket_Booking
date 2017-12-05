<?php

namespace App\Http\Controllers\Trains;
session_start();

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    //定义主页
    public function index(Request $request)
    {

        return view("trains.index");
    }

    //定义用户信息
    public function messages(Request $request){


        $mobile = $request->input('mobilePhone');


        $model = $key =  config('juhe.mobile.mo');

        $key = config("app.juhe_key");
        //创建一个随机自然数.
        srand((double)microtime()*1000000);

        //定义一个随机数组
        $ychar="0,1,2,3,4,5,6,7,8,9,A,B,C,D";

        //把字符串组合成数组
        $list=explode(",",$ychar);

        //声明一个authnum变量
        $authnum='';

        for($i=0;$i<6;$i++){
            $randnum=rand(0,13); // 10+26;
            $authnum.=$list[$randnum];
        }

//把获取的值存入session

        $_SESSION['authnum'] = strtoupper($authnum);

        //拼接要发送的信息
        $code  = urlencode("#code#=$authnum&#company#=爱旅纷途");

        //请求地址
        $queryUrl = "http://v.juhe.cn/sms/send";

        //创建请求对象
        $client = new \GuzzleHttp\Client();

        //发送请求
        $result = $client->request('GET',$queryUrl,[
            'query'=>[
                'mobile' => $mobile,
                'tpl_id' => $model,
                'tpl_value' => $code,
                'key' => $key
            ]
        ]);

//获取响应内容
        $json = $result->getBody()->getContents();

        return view("trains.messages");
    }

    //定义用户信息确认控制
    public function SureMessage(){
        return view("trains.checkmessages");
    }

    //定义支付控制器
    public function payFor(){
        return view("trains.payfor");
    }

}
