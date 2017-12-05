<style>
    .panel-body p:nth-child(1){
        color: deepskyblue;
        font-size: 1em;
    }
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">订单详情</h1>
                <h1 class="page-subhead-line">欢迎来到订单详情</h1>
            </div>
        </div>
        @foreach($trainsModel as $item)
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="panel  panel-info">
                        <div class="panel-heading">
                        <span>
                            订单编号:<b id="train_order_no">{{ isset($item->order_info->user_orderid)?$item->order_info->user_orderid:'--' }}</b>

                        </span>
                            <p class="pull-right"><i class=" fa fa-trash "></i></p>
                        </div>
                        <div class="panel-body ">
                            <div class="col-md-2 col-xs-6">
                                <p class="station">订单信息</p>
                                <p><span id="from_station">{{$item->from_station_name}}</span>→ <span
                                            id="to_station">{{$item->to_station_name}}</span></p>
                            </div>
                            <div class="col-md-2  col-xs-6">
                                <p class="station">产品类型</p>
                                <p class="time"> 火车票</p>
                            </div>
                            <div class="col-md-2  col-xs-6 ">
                                <p>下单时间</p>
                                <p id="pay_order_date">{{$item->created_at}}</p>
                            </div>
                            <div class="col-md-2 col-xs-6 ">
                                <p>乘车时间
                                <p/>
                                <p id="order_date">{{$item->train_date}}</p>
                            </div>
                            <div class="col-md-2  col-xs-6 ">
                                <p>订单金额
                                <p/>
                                <p style="font-size:1.3em;color: orangered "
                                   id="price">¥{{number_format(floatval($item->passengers_decode[0]->price),2,'.','')}}</p>
                            </div>
                            <div class="col-md-2 col-xs-6 ">
                                <p>订单状态
                                <p/>
                                @if($item->order_info && isset($item->order_info->order) )

                                    @if($item->order_info->order->pay_status == 1 )
                                        <p id="order_status">已支付
                                            <button class="btn  btn-success btn-xs" onclick="window.location.href='{{url("/user/order/history")}}'">查看</button>
                                        </p>

                                    @elseif($item->order_info->order->pay_status == 0 /*&& $item->order_info->order->pay_status == ""*/)
                                        <p id="order_status">未支付
                                            {{--@if((strtotime($item->order_info->order->created_at)-time())/60>30)--}}
                                                <button class="btn  btn-warning btn-xs" >已经过期</button>
                                               {{-- <button class="btn  btn-warning btn-xs" onclick="window.location.href='{{url("/payment/alipay")}}'">已经过期</button>--}}
                                            {{--@endif--}}
                                        </p>
                                    @endif

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>