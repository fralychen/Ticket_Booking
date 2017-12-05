<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--自动适应移动屏幕-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--优先使用webkit内核渲染-->
    <meta name="renderer" content="webkit">
    <!--不要被百度转码-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="{{asset('css/mobile/amazeui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobile/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/mobile/wap.css')}}">
    <title>订单详情</title>
</head>
<body>
<!--头部-->
<header data-am-widget="header" class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="{{url('mobile/station/order')}}" class="">
            <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        火车票订单详情
    </h1>
</header>

<!--列车信息-->
<section data-am-widget="accordion" class="am-accordion am-accordion-gapped " data-am-accordion='{  }'>
    <table class="am-table  am-table-radius order_img">
        <tbody>
        <tr>
            <td>
                <span class="oreder_city">{{$from_station_name}}</span>
                <p class="oreder_time">{{$start_time}}</p>
                <p>{{date('y月m日',strtotime($train_start_date))}}</p>
            </td>
            <td>
                <span class="details_checi">{{$train_code}}</span>
                <p class="details_jingtingzhan"></p>
            </td>
            <td>
                <span class="oreder_city">{{$to_station_name}}</span>
                <p class="oreder_time">{{$arrive_time}}</p>
                <p>{{date('y月m日',strtotime($train_start_date))}}</p>
            </td>
        </tr>
        </tbody>
    </table>
    <!--添加乘客-->
    <div class="am-panel am-panel-default detais_panel">
        <div class="am-panel-bd detais_img ">
            <p class="details_chepiaoxingxi">车票信息</p>
            <span><b class="details_username">张三</b>
			     	<span class="am-align-right details_piaoright">
			     		<p>取票号：E334404663</p>
			     		<dnf>￥{{$price}}</dnf>
			     		<p>含保险</p>
			     	</span>
			     </span>
        </div>
        <div>
            <p class="detais_zhuoci">{{$price}}</p>
            <p class="detais_daizhifu">待付款</p>
        </div>
    </div>
</section>
<!--footer-->
<div class="am-navbar am-navbar-default am-g am-g-fixed">
    <a href="{{url('mobile')}}" class="am-u-sm-6">
        <input type="button" class="detais_input am-btn am-btn-default btn-loading-example" value="取消订单"/>
    </a>
    <a href="#" class="am-u-sm-6">
        <input type="button" class="detais_input am-btn am-btn-success btn-loading-example" value="立即支付"/>
    </a>
</div>
<script src="{{asset('/js/mobile/jquery.min.js')}}"></script>
<script src="{{asset('js/mobile/amazeui.min.js')}}"></script>
</body>
</html>
