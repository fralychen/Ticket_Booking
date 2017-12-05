<?php
/**
 * Created by PhpStorm.
 * User: alvft
 * Date: 2017/5/22
 * Time: 19:01
 */

Route::group(['middleware' => 'web','prefix'=>'mobile'],function (){

    //首页
/*    Route::get('/',function (){
        echo 1;
    });*/
    Route::get('/','Mobile\Index\MobileController@index');

    //购票系统
    Route::group(['prefix'=>'station'],function (){

        //票务显示
        Route::get('/train','Mobile\Station\TrainController@index');
       /* Route::get('/train',function (){
            return 1;
        });*/

        //出发地
        Route::get('/dptcode','Mobile\Station\DptcodeController@index');
        //目的地
        Route::get('/eptcode','Mobile\Station\EptcodeController@index');

        //订单详情
        Route::get('/order','Mobile\Station\OrderController@index');

        Route::get('/details','Mobile\Station\DetailsController@index');

        Route::post('/details/conduct','Mobile\Station\DetailsController@detailsConduct');

        //添加乘客
        Route::get('/add','Mobile\Station\AddController@index');

    });

});