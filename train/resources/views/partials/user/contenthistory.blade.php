<style>
    .panel-body p:nth-child(1) {
        color: deepskyblue;
        font-size: 1em;
    }

    dnf {
        color: orange
    }
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">历史订单</h1>
                <h1 class="page-subhead-line">欢迎来到历史订单</h1>
            </div>
        </div>
        @foreach($trainsModel as $item)
            @if($item->order_info && isset($item->order_info->order))
                @if($item->order_info->order->pay_status == 1 )

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <div class="panel  panel-info">
                                <div class="panel-heading">
                                    <span>
                                        订单编号:<b id="train_order_no">{{ isset($item->order_info->user_orderid)?$item->order_info->user_orderid:'--' }}</b>
                                    </span>
                                    <p class="pull-right"><i class="fa fa-trash "></i></p>
                                </div>
                                <div class="panel-body ">
                                    <div class="col-md-2 col-xs-6">
                                        <p class="station">订单信息</p>
                                        <p><span id="from_station">{{$item->from_station_name}}</span>→ <span
                                                    id="to_station">{{$item->to_station_name}}</span></p>
                                    </div>
                                    <div class="col-md-1  col-xs-6">
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
                                           id="price">
                                            ¥{{number_format(floatval($item->passengers_decode[0]->price),2,'.','')}}</p>
                                    </div>
                                    <div class="col-md-2 col-xs-6 ">
                                        <p>订单状态
                                        <p/>
                                        {{--<p id="order_status">未支付<a href="{{asset('/user/order/history')}}">（查看）</a></p>--}}
                                        <p id="order_status">已支付
                                            {{--<button class="btn  btn-success btn-xs" onclick="window.location.href='{{url("/user/order/history")}}'">查看</button>--}}
                                        </p>
                                    </div>
                                    <div class="col-md-1 col-xs-6 ">
                                        <p>操作
                                        <p/>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#myModal" value="{{$item->order_id}}" id="refundBT">退票
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- 模态框（Modal） -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        &times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">
                                        交易提示
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <h4><i class="fa fa-question-circle fa-3x" style="color:orange"></i><b>您确认要退款吗</b>
                                    </h4>
                                    <p>退款信息：</p>
                                    <span>


                                    @if($item->order_info->order->pay_status == 1 )
                                            车票退款:<b>{{number_format(floatval($item->passengers_decode[0]->price),2,'.','')}}
                                                元</b>，退票费：当前时间按
                                            <dnf>5%</dnf>核收，计为<b>{{number_format(floatval($item->passengers_decode[0]->price),2,'.','')*0.05}}
                                                元</b>
                                            应退票款
                                            <dnf>{{number_format(floatval($item->passengers_decode[0]->price),2,'.','')-number_format(floatval($item->passengers_decode[0]->price),2,'.','')*0.05}}
                                                元</dnf>，实际核收退票费及应退票款按最终交易时间计算。
                </span>
                                    @endif


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">取消
                                    </button>
                                    <button type="button" class="btn btn-warning"
                                            onclick="window.location.href='{{url("/user/order/refund")}}'">
                                        确认
                                    </button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal -->
                    </div>

                @endif
            @endif
        @endforeach
    </div>
</div>