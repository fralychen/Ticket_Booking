<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}"/>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('css/payment.css')}}" />
    <title>支付</title>
</head>
<body>
@include('partials.top')
@include('partials.logo')
<div class="clearfix">
    <!--面包屑 S-->
    <div class="crumbs">
                <span>
                <input type="hidden" id="md">
                <a href="{{url('/station')}}">票务信息&gt;</a>
                <a href="{{url('http://www.alvft.top/station/order')}}">填写资料&gt;</a>
                <a href="#">支付</a>
               </span>
    </div>
</div>
<div class="container">
    <!--支付提交-->
    <div class="panel panel-default" id="panel">
        <div class="panel-body">
            <div>
                <span>
                    <span>产品名称：</span>
                    <span>{{ $from_station_name }} - {{ $to_station_name }}</span>
                    <span class="pull-right">应付金额<dnf>{{ $price }}</dnf>元</span>
                </span>
            </div>
            <div>
                <span>
                    订单编号：<b>{{ $trains_info->user_orderid }}</b> | 订单金额：<b>{{ $price }} </b>元                 </span>
            </div>
        </div>
    </div>
    <!--平台-->
    <div class="panel panel-default" id="pane12">
        <div class="zhifu">
            <h4>支付平台</h4>
            <img src="{{asset('/img/zhifubao.png')}}">
            <span class="pull-right">
               <button type="button" class="btn btn-success" id="pay-for"
                       >确认提交支付</button></span>
        </div>
    </div>
    <!--支付问题-->
    <div class="wenti">
        <span>
            <h4>支付常见问题：</h4>
<div>
    <p>1.订单金额超过银行卡支付限额怎么办？</p>
   <p>答：银行卡限额是指单笔交易在支付时候的最大额度以及每个月最高的支出金额。
    </p>

<p>2.忘记当前银行卡在银行保存的手机号码怎么办？</p>
<p>答：您可拨打银行客服电话查看或修改银行卡预存手机号码。
    请明确告诉银行客服是修改该银行卡绑定的手机号码。</p>

<p>3.无法收到手机短信校验码怎么办？</p>
<p>答：请确认您当前使用的手机号码和该银行卡在银行预存的手机号码一致。
    如果不一致，请拨打银行客服热线，修改预存的手机号码。
    如果一致，可致电客服电话4007-999-999，联系客服处理。</p>
<a href="#">更多>></a>
</div>
        </span>
    </div>
</div>
<!--底部-->
@include('partials.footer')
<script>
    $(function () {

        $("#pay-for").click(function () {
            $.get('{{url('station/order/query')}}',{},function (json) {

                if (json.result.status == '2'){
                    location.href = "{{ url('payment/alipay') }}";
                }else{
                    alert( json.result.msg + ' ,请稍后.....');
                }

            },'json');
        });
    });
</script>
</body>
</html>
