<?php
/**
 * Created by PhpStorm.
 * User: alvft
 * Date: 2017/4/15
 * Time: 13:42
 */



Route::group(['middleware' => 'web'], function () {

    Route::post('/alogin','Auth\LoginController@login');

    //登录路由
    Route::auth();
    // 首页
    Route::get('/', 'Index\IndexController@index');
    // 查询
    Route::get('/station', 'Station\IndexController@index');
    Route::post('/station/order', 'Station\OrderController@index');
    Route::post('/station/order/confirm', 'Station\OrderController@confirm');
    Route::get('/station/order/confirm/yzcode', 'Station\OrderController@sendYZCode');
    Route::get('/station/order/pay', 'Station\PayController@index');
    Route::get('/station/order/query', 'Station\PayController@orderStatus');




    //发起支付请求
    Route::get('/payment/{type}', 'Payments\PayController@index');
    //Route::get('/surex', 'Trains\IndexController@SureMassage');
    //支付回调跳转通知处理
    Route::get("/payment-return/{type}",'Payments\ReturnController@index');
    //支付异步通知处理
    Route::get("/payment-notify/{type}",'Payments\NotifyController@index');


    //发起退款请求
    Route::get('/refund_return/{type}', 'Refund\RefundController@index');
    Route::get('/refund_notify/{type}', 'Payments\PayController@index');

});


