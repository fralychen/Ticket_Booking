<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>订单状态</title>
    @include('partials.user.head')
</head>
<body>
<div class="app app-header-fixed" id="app">
    <!-- navbar -->
@include('partials.user.header')
<!-- menu -->
    <div class="app-aside hidden-xs bg-dark">
        @include('partials.user.border')
    </div>
@include('partials.user.content')

<!--类容-->
    <!--订单状态-->
    <div class="container" id="allDiv">
        @foreach($trainsModel as $item)
            @if($item->order_info ==0 or $item->order_info ==1 )
            <div class="row">
                <div class="col-md-12 col-xs-12">
                @if($item->order_info->order->pay_status == 0 )
                    <div class="panel  panel-info">
                        <div class="panel-heading">
                        <span>
                            订单编号:<b id="train_order_no">{{ isset($item->order_info->user_orderid)?$item->order_info->user_orderid:'--' }}</b>

                        </span>
                            <p class="pull-right"><img class="delete" src="{{asset('img/delete.png')}}" alt="删除"></p>
                        </div>
                        <div class="panel-body ">
                            <div class="col-md-2 col-xs-12">
                                <p class="station">订单信息</p>
                                <p><span id="from_station">{{$item->from_station_name}}</span>→ <span
                                            id="to_station">{{$item->to_station_name}}</span></p>
                            </div>
                            <div class="col-md-2  col-xs-12">
                                <p class="station">产品类型</p>
                                <p class="time"> 火车票</p>
                            </div>
                            <div class="col-md-2  col-xs-12 ">
                                <p>下单时间</p>
                                <p id="pay_order_date">{{$item->created_at}}</p>
                            </div>
                            <div class="col-md-2 col-xs-12 ">
                                <p>乘车时间
                                <p/>
                                <p id="order_date">{{$item->train_date}}</p>
                            </div>
                            <div class="col-md-2  col-xs-12 ">
                                <p>订单金额
                                <p/>
                                <p style="font-size:1.3em;color: orangered "
                                   id="price">{{$item->passengers_decode[0]->price}}</p>
                            </div>
                            <div class="col-md-2 col-xs-12 ">
                                <p>订单状态
                                <p/>

                                        <p id="order_status">未支付<a href="{{asset('/user/order/history')}}">（去支付）</a></p>
                                    @elseif($item->order_info->order->pay_status == 1 )
                                        <p id="order_status">已支付<a href="{{asset('/user/order/history')}}">（查看）</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            </div>
            @endif
        @endforeach
    </div>
    <!-- footer -->
@include('partials.user.footer')

<!-- / footer -->
</div>
<!-- jQuery -->
@include('partials.user.footerjs')
@include('partials.user.del_js')

</body>
</html>