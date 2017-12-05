<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/4/17
 * Time: 12:16
 */


return [

    'app_key' => '50d82942542d3faef6f1a5976ae69822',

    /**
     * 您申请到的APPKEY
     *
     *  调用方式
     *  $key =  config('juhe.trainTickets.key');
     */
    'trainTickets' => [
        //APP_KEY
        "key" => "50d82942542d3faef6f1a5976ae69822",
        //站点简码查询
        "ticketsCityCode" => "http://op.juhe.cn/trainTickets/cityCode",
        //余票查询地址
        "ticketsAvailable" => "http://op.juhe.cn/trainTickets/ticketsAvailable",
        //提交订单地址
        "ticketsSubmit" => "http://op.juhe.cn/trainTickets/submit",
        //请求出票地址
        "ticketsPay" => "http://op.juhe.cn/trainTickets/pay",
        //订单状态查询地址
        "ticketsOrderStatus" => "http://op.juhe.cn/trainTickets/orderStatus",
        "ticketsRefund" => "http://op.juhe.cn/trainTickets/refund",
    ],

    //余额查询地址
    "balanceUrl" => "http://op.juhe.cn/trainTickets/balance.php",
    //发送短信key
    "msgKey" => "7feaa7f87c1a7be0ca77b7458de6b2be",
    //短信接口地址
    "msgUrl" => "http://v.juhe.cn/sms/send",
    //短信模板
    "msgTemplate" => [
        //验证码模板ID
        'yzcode' => '31945',
        'order' => '31946'
    ],


];