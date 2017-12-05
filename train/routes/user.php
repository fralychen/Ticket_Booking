<?php
/**
 * Created by PhpStorm.
 * User: alvft
 * Date: 2017/4/15
 * Time: 13:40
 */


Route::group(['middleware' => 'web','prefix' => 'user'], function () {

    //用户中心首页
    Route::get("/","User\\Index\\IndexController@index");
    //用户订单列表首页

    Route::group(['prefix'=>'order'],function (){
       /* Route::get("/","User\\Order\\IndexController@index");*/
        Route::get("/info","User\\Order\\InfoController@index");
        Route::get("/history","User\\Order\\HistoryController@index");
        Route::get("/help","User\\Order\\HelpController@index");
        Route::get("/refund","Refund\\RefundController@index");
        Route::get("/error","User\\Order\\ErrorController@index");
    });
});