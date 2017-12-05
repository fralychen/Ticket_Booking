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
    <title>填写订单</title>
</head>
<body>
<!--头部-->
<header data-am-widget="header" class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="{{url('mobile/station/train')}}" class="">
            <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        填写订单
    </h1>
</header>
<!--列车信息-->
<section data-am-widget="accordion" class="am-accordion am-accordion-gapped " data-am-accordion='{  }'>
    <table class="am-table  am-table-radius order_img">
        <tr>
            <td>
                <span class="oreder_city">{{session('pramstrain')['from_station_name']}}</span>
                <p class="oreder_time">{{session('pramstrain')['start_time']}}</p>
                <p>{{date('m月d日',strtotime(session('pramstrain')['train_start_date']))}}</p>
                <p>{{session('pramstrain')['train_code']}}</p>
            </td>
            <td>
                <p>&nbsp;</p>
                <span class="oreder_timesum">{{session('pramstrain')['run_time']}}</span>
                <p class="oreder_jingtingzhan"></p>
                <p class="order_jiage">￥{{session('pramstrain')['price']}}</p>
            </td>
            <td>
                <span class="oreder_city">{{session('pramstrain')['to_station_name']}}</span>
                <p class="oreder_time">{{session('pramstrain')['arrive_time']}}</p>
                <p>{{date('m月d日',strtotime(session('pramstrain')['train_start_date']))}}</p>
                <p>{{session('pramstrain')['zuowei']}}</p>
            </td>
        </tr>
    </table>
    <!--添加乘客-->
    <div class="am-panel am-panel-default">
        <div class="am-panel-bd"><i onclick="location.href='{{url('mobile/station/add')}}'" style="color:deepskyblue;"
                                    class="fa fa-plus-square"></i>&nbsp;&nbsp;&nbsp;添加/修改乘客

            <hr/>
            <p> <span><b>{{session('prams')['fareName']}}</b></span> <span> {{session('prams')['card_num']}}</span></p>
        </div>
        <hr/>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;手机号码&nbsp;&nbsp;&nbsp;&nbsp;
            <b>189 9898 8989</b>&nbsp;&nbsp;
        </p>
    </div>
</section>
<div class="am-navbar am-navbar-default">
    <ul class="am-navbar-nav">
        <li>
            <form action="{{url('mobile/station/details/conduct')}}" method="post">
                {{csrf_field()}}
                <input type="hidden" value="{{session('pramstrain')['from_station_name']}}"  name="from_station_name">
                <input type="hidden" value="{{session('pramstrain')['start_time']}}"  name="start_time">
                <input type="hidden" value="{{session('pramstrain')['train_start_date']}}"  name="train_start_date">
                <input type="hidden" value="{{session('pramstrain')['run_time']}}"  name="run_time">
                <input type="hidden" value="{{session('pramstrain')['price']}}"  name="price">
                <input type="hidden" value="{{session('pramstrain')['to_station_name']}}"  name="to_station_name">
                <input type="hidden" value="{{session('pramstrain')['arrive_time']}}"  name="arrive_time">
                <input type="hidden" value="{{session('pramstrain')['zuowei']}}"  name="zuowei">
                <input type="hidden" value="{{session('pramstrain')['train_start_date']}}"  name="train_start_date">
                <input type="hidden" value="{{session('pramstrain')['train_code']}}"  name="train_start_date">
                <input type="hidden" value="{{session('pramstrain')['from_station_code']}}"  name="from_station_code">
                <input type="hidden" value="{{session('pramstrain')['to_station_code']}}"  name="to_station_code">
                <input type="hidden" value="{{session('pramstrain')['train_start_date']}}"  name="train_start_date">
                <input type="hidden" value="{{session('prams')['fareName']}}"  name="fareName">
                <input type="hidden" value="{{session('prams')['card_num']}}"  name="card_num">

                <button type="submit">提交订单</button>
            </form>
           {{-- <a href="{{url('mobile/station/details')}}">
                提交订单
            </a>--}}
        </li>
    </ul>
</div>
<script src="{{asset('js/mobile/jquery.min.js')}}">

</script>
<script src="{{asset('js/mobile/amazeui.min.js')}}"></script>
</body>
</html>
