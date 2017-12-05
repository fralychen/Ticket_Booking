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
    <script src="{{asset('/js/mobile/jquery.min.js')}}"></script>
    <script src="{{asset('/js/mobile/amazeui.min.js')}}"></script>
    <title>填写订单</title>
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
        填写订单
    </h1>
</header>
<!--列车信息-->
<section data-am-widget="accordion" class="am-accordion am-accordion-gapped " data-am-accordion='{  }'>
    <!--添加乘客-->
    <div class=" am-panel-default">
        <form method="" action="{{url('mobile/station/order')}}">
            {{csrf_field()}}
        <div class="am-input-group ">
            <span style="border:none;background-color: white" class="am-input-group-label">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</span>
            <input  type="text" class="am-form-field" placeholder="乘车人姓名" name="fareName">
        </div>
        <hr/>
        <div class="am-input-group ">
            <span class="am-input-label">车票类型</span>
            <select data-am-selected name="ticket_type">
                <option value="c" selected>成人票</option>
                <option value="r">儿童票</option>
            </select>
        </div>
        <hr/>
        <div class="am-input-group ">
            <span class="am-input-label">证件类型</span>
            <select data-am-selected class="add_select" name="card_type">
                <option value="s" selected>身份证</option>
                <option value="h">护照</option>
                <option value="t">台胞证</option>
                <option value="g">港澳通行证</option>
            </select>
        </div>
        <hr/>

        <div class="am-input-group ">
            <span style="border:none;background-color: white" class="am-input-group-label">证件号码</span>
            <input type="text" class="am-form-field" placeholder="乘车人证件号" name="card_num">
        </div><hr/>
            <button type="submit" class="am-btn am-btn-primary am-btn-block">完成</button>
        </form>
    </div>
</section>
</body>
</html>
