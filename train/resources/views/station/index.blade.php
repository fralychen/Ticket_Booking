﻿@extends("layouts.app")
@section("content")
    <link rel="stylesheet" href="{{asset('css/mycss/train.css')}}">
    <link rel="stylesheet" href="{{asset('css/personalcenter/css/font-awesome.css')}}" type="text/css"/>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        a, img {
            border: 0;
        }

        body {
            font: 12px/180% Arial, Helvetica, sans-serif, "新宋体";
        }

        .iptgroup {
            width: 420px;
            height: 40px;
            margin: 20px auto 0 auto;
        }

        .iptgroup span {
            float: left;
            height: 30px;
            line-height: 30px;
            padding: 5px;
        }

        .iptgroup span .ipticon {
            background: url({{asset('/img/blue/date_icon.gif')}}) 98% 50% no-repeat;
            border: 1px #CFCFCF solid;
            padding: 3px;
        }
    </style>
    <script type="text/javascript">
        $(function () {
            /*点击事件*/
            $(function () {
                /*地点转换*/
                $("#span").click(function () {
                    var init = $("#init").val();//起始地点
                    var out = $("#out").val();//终点
                    $("#init").val(out);
                    $("#out").val(init);
                })
            });

            $(function () {
                $('.doubledate').kuiDate({
                    className: 'doubledate',
                    isDisabled: "0"  // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
                });
            });
        })
    </script>
    <!--面包屑 S-->
    <div id="layout_piaowu">
        <div class="crumbs">
            <p>
                <input type="hidden" id="md">
                <a onclick="history.go(-1)">火车票务&gt;</a>
                <span id="J_Crumb">
                    <span>
                        {{isset($dptName) ? $dptName :''}}

                    </span>
                    到
                    <span>
                        {{ isset($eptName) ? $eptName :'' }}
                    </span>
                    火车票
                </span>
            </p>
        </div>
        <!--查询-->
        <div class="panel panel-default" id="panel">
            <div class="container" style="margin:2%">
                <div class="row">
                    <div class="panel-body">
                        <form class="navbar-form navbar-left form2" role="search" action="{{ url('messages') }}">
                            <input id="dptCode"  type="text" value="{{isset($dptName) ? $dptName :''}}"
                                   size="15" name="dptCode" mod="address|notice" mod_address_source="hotel"
                                   mod_address_suggest="@Beijing|北京|53@Shanghai|上海|321@Shenzhen|深圳|91@Guangzhou|广州|80@Qingdao|青岛|292@Chengdu|成都|324@Hangzhou|杭州|383@Wuhan|武汉|192@Tianjin|天津|343@Dalian|大连|248@Xiamen|厦门|61@Chongqing|重庆|394@"
                                   mod_address_reference="cityid" mod_notice_tip="出发地"/>
                            {{-- <input type="text" id="dptCode" class="form-control"
                                    value="{{isset($dptName) ? $dptName :''}}">--}}
                            <span id="huan" style="cursor:pointer;width:50px;height:40px;text-align:left;color:deepskyblue;
                                   "><i class="fa fa-exchange "></i>
                                    </span>
                            <input  id="eptCode" type="text"
                                   value="{{ isset($eptName) ? $eptName :'' }}" size="15" name="eptCode"
                                   mod="address|notice" mod_address_source="hotel"
                                   mod_address_suggest="@Beijing|北京|53@Shanghai|上海|321@Shenzhen|深圳|91@Guangzhou|广州|80@Qingdao|青岛|292@Chengdu|成都|324@Hangzhou|杭州|383@Wuhan|武汉|192@Tianjin|天津|343@Dalian|大连|248@Xiamen|厦门|61@Chongqing|重庆|394@"
                                   mod_address_reference="getcityid" mod_notice_tip="到达地"/>
                            {{--<input type="text" id="eptCode" class="form-control"
                                   value="{{ isset($eptName) ? $eptName :'' }}">--}}
                            <span class="iptgroup">日期
                            <input class="doubledate ipticon " id="mydate" type="text"
                                   value="{{  isset($date) ? $date :''}}" readonly="readonly">
                             </span>
                            <button type="button" id="queryTickets" class="btn btn-success">查询</button>
                            <span class="menu" id="right_app">
                                <i class="fa fa-mobile-phone fa-2x" style="color:#bce8f1;"></i>&nbsp;App专享特惠
                                <img src="{{asset('/img/s_sj.png')}}">
                            </span>
                            <div id="jsContainer" class="jsContainer" style="height:0">
                                <div id="tuna_alert"
                                     style="display:none;position:absolute;z-index:999;overflow:hidden;"></div>
                                <div id="tuna_jmpinfo" style="visibility:hidden;position:absolute;z-index:120;"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--余票-->
        <div class="clearfix">
            <!--筛选条件-->
            <div class="" id="pkg_sort">
                <a href="javascript:(0)" class="item_id_0">车次</a>
                <a href="javascript:(0)" class="item_id_1">发时<i class="fa fa-arrow-up" style="color:deepskyblue"></i>到时<i class="fa fa-arrow-up"></i></a>
                <a href="javascript:(0)" class="item_id_3">出发/到达</a>
                <a href="javascript:(0)" class="item_id_4">运行时间<i class="fa fa-arrow-up"></i></a>
                <a href="javascript:(0)" class="item_id_5">参考票价<i class="fa fa-arrow-up"></i></a>
                <a href="javascript:(0)" class="item_id_6">余票</a>
                <a href="javascript:(0)" class="item_id_7">
                    <input type="checkbox" checked="checked">
                    显示有票车次</a>
            </div>
            <div class="container">
                <div class="panel-body" >
                    <table class="col-md-12 "  >
                        <tbody  >
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        <!--footer-->
    @include('partials.footer')
    {{-- <script src="{{asset('js/fixdiv.js')}}"></script>--}}
    <script src="{{asset('js/address.js')}}"></script>
    <!--弹出的模态框-->
    <div id="mymodal" class="modal fade bs-examlpe-modal-sm"><!-- modal固定布局，上下左右都是0表示充满全屏，支持移动设备上使用触摸方式进行滚动。。-->
        <div class="modal-dialog modal-sm"><!-- modal-dialog默认相对定位，自适应宽度，大于768px时宽度600，居中-->
            <div class="modal-content"><!-- modal-content模态框的边框、边距、背景色、阴影效果。-->
                <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        <img src="{{asset('/img/logo.png')}}" style="width:200px" alt=""/>
                        <br/>
                    </h4>
                </div>
                <div class="media-body">
                    @include("partials.yzcode")
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            /*地点转换*/
            $("#huan").click(function () {
                var init = $("#dptCode").val();//起始地点
                var out = $("#eptCode").val();//终点
                $("#dptCode").val(out);
                $("#eptCode").val(init);
            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            //加载页面完成 调用查询
            getTickets();

            //绑定查询点击事件 调用查询
            $("#queryTickets").click(function () {
                getTickets();
            });

        });

        function getTickets() {
            //获取出发日期输入框的值
            var dptime = $("#mydate").val();
            //获取出发地输入框的值
            var dptCode = $("#dptCode").val();
            //获取目的地输入框的值
            var eptCode = $("#eptCode").val();
            if (/^[\u4e00-\u9fa5]+$/gi.test(dptCode) && /^[\u4e00-\u9fa5]+$/gi.test(eptCode)){

                if (dptCode || eptCode) {
                    //定义拼接参数
                    var params = {
                        'tickets': 1,  // 这里自定义参数
                        'Dptime': dptime,  // 这里是日期参数
                        'dptCode': dptCode,  // 这里就是始发站代号参数
                        'eptCode': eptCode  //这里就是终点站代号参数
                    };
                    //console.log(params);
                    $(".panel-body table").html("正在努力查询...");
                    $.get("{{ url('station') }}", params, function (data) {
                        if (data.error_code === 0) {
                            var lists = data.result.list;
                            console.log(lists);
                            var row = '';
                            var rowStart = '<div class="row biankuang"><div class="panel-body"><table class="col-md-12 "><tbody style="border: 1px solid lightgrey">';
                            var rowEnd = '</tbody></table></div></div>';
                            for (var i in lists) {
                                var td = "";
                                td += '<td class="col-md-2 checi">' + lists[i].train_code + '<div><span class="xiala"><a>经停站</a><img src="../img/xiala.png"></span></div></td>'
                                td += '<td class="col-md-2"><p class="inittime">' + lists[i].start_time + '</p><p>' + lists[i].arrive_time + '</p></td>';
                                td += '<td class="col-md-2"><p><b class="shi">始</b>:' + lists[i].from_station_name + '</p><p><b class="zhong">终</b>:' + lists[i].to_station_name + '</p></td>';
                                td += '<td class="col-md-1-offset-1">' + lists[i].run_time + '</td>';
                                td += getOrder(lists[i]);
                                row += rowStart + '<tr>' + td + '</tr>' + rowEnd;
                            }
                            $(".panel-body table").html(row);
                        } else {
                            $(".panel-body table").html(data.reason);
                        }
                    }, 'json');
                } else {
                    alert("请输入出发站、终点站");
                }


            }else {
                alert("只能输入汉字");
                window.location.reload();
            }


        }


        function getOrder(item) {


//            "end_station_name": "上海虹桥", /*终到站名*/
//                "swz_price": 1748, /*商务座票价*/
//                "swz_num": "15", /*商务座余票数量*/
//                "to_station_name": "上海虹桥", /*到达车站名*/
//                "ydz_num": "54", /*一等座余票数量*/
//                "yz_num": "--", /*硬座的余票数量*/
//                "rw_num": "--", /*软卧（下）余票数量*/
//                "arrive_days": "0",  /*列车从出发站到达目的站的运行天数 0:当日到达1,: 次日到达,2:三日到达,3:四日到达,依此类推*/
//                "rz_num": "--", /*软座的余票数量*/
//                "access_byidcard": "1", /*是否可凭二代身份证直接进出站*/
//                "yz_price": 0, /*硬座票价*/
//                "sale_date_time": "1230", /*车票开售时间*/
//                "from_station_code": "VNP", /*出发车站简码*/
//                "rz_price": 0, /*软座的票价*/
//                "gjrw_num": "--", /*高级软卧余票数量*/
//                "to_station_code": "AOH", /*到达车站简码*/
//                "ydz_price": 933, /*一等座票价*/
//                "wz_price": 0, /*无座票价*/
//                "tdz_price": 0,  /*特等座票价*/
//                "run_time": "05:37", /*历时（出发站到目的站）*/
//                "yw_num": "--", /*硬卧的余票数量*/
//                "edz_price": 553, /*二等座票价*/
//                "qtxb_price": 0, /*其他席别对应的票价*/
//                "can_buy_now": "Y",   /*当前是否可以接受预定*/
//                "rw_price": 0, /*软卧（下）票价*/
//                "train_type": "G", /*列车类型*/
//                "yw_price": 0, /*硬卧票价（因为硬卧上中下铺价格不同，这个价格一般是均价），请务必阅读
//             http://code.juhe.cn/docs/201 中第15条*/
//                "note": "", /*备注*/
//                "train_no": "240000G1010A", /*列车号*/
//                "train_code": "G101", /*车次*/
//                "from_station_name": "北京南", /*出发车站名*/
//                "run_time_minute": "337", /*历时分钟合计*/
//                "arrive_time": "12:37", /*到达时刻*/
//                "start_station_name": "北京南", /*始发站名*/
//                "start_time": "07:00", /*出发时刻*/
//                "edz_num": "900", /*二等座的余票数量*/
//                "wz_num": "--", /*无座的余票数量*/
//                "qtxb_num": "--", /*其他席别余票数量*/
//                "train_start_date": "20150711", /*列车从始发站出发的日期*/
//                "gjrw_price": 0, /*高级软卧票价*/
//                "tdz_num": "--" /*特等座的余票数量*/


            var zuowei = [];
            //	商务座	特等座	一等座	二等座	高级 软卧	软卧	硬卧	软座	硬座	无座	其他	备注
            //商务座数据
            if (checkPrice(item.swz_price)) {
                zuowei.push({
                    'name': '商务座',
                    'num': item.swz_num,
                    'price': item.swz_price
                });
            }
            // 特等座数据
            if (checkPrice(item.tdz_price)) {
                zuowei.push({
                    'name': '特等座',
                    'num': item.tdz_num,
                    'price': item.tdz_price
                });
            }

            // 一等座数据
            if (checkPrice(item.ydz_price)) {
                zuowei.push({
                    'name': '一等座',
                    'num': item.ydz_num,
                    'price': item.ydz_price
                });
            }
            // 二等座数据
            if (checkPrice(item.edz_price)) {
                zuowei.push({
                    'name': '二等座',
                    'num': item.edz_num,
                    'price': item.edz_price
                });
            }
            // 高级软卧数据
            if (checkPrice(item.gjrw_price)) {
                zuowei.push({
                    'name': '高级软卧',
                    'num': item.gjrw_num,
                    'price': item.gjrw_price
                });
            }
            // 软卧数据
            if (checkPrice(item.rw_price)) {
                zuowei.push({
                    'name': '软卧',
                    'num': item.rw_num,
                    'price': item.rw_price
                });
            }
            // 硬卧数据
            if (checkPrice(item.yw_price)) {
                zuowei.push({
                    'name': '硬卧',
                    'num': item.yw_num,
                    'price': item.yw_price
                });
            }
            // 软座数据
            if (checkPrice(item.rz_price)) {
                zuowei.push({
                    'name': '软座',
                    'num': item.rz_num,
                    'price': item.rz_price
                });
            }
            // 硬座数据
            if (checkPrice(item.yz_price)) {
                zuowei.push({
                    'name': '硬座',
                    'num': item.yz_num,
                    'price': item.yz_price
                });
            }
            // 无座数据
            if (checkPrice(item.wz_price)) {
                zuowei.push({
                    'name': '无座',
                    'num': item.wz_num,
                    'price': item.wz_price
                });
            }
            // 其它数据
            if (checkPrice(item.qtxb_price)) {
                zuowei.push({
                    'name': '其它',
                    'num': item.qtxb_num,
                    'price': item.qtxb_price
                });
            }

            var z = ""; //座位
            var y = ""; //余票
            var x = ""; //下单
            var payTime = item.note;
            //console.log(payTime);
            if (!payTime) {
                for (var i in zuowei) {
                    var zuoweiNum = zuowei[i].num;


                    //console.log(zuoweiNum);
                    console.log(item.train_code, zuowei[i].name, zuowei[i].price, zuoweiNum);
                    if (zuoweiNum > 0) {
                        var formHtml = "";
                        z += '<span><p>' + zuowei[i].name + '<dnf id="dnf">&nbsp;&nbsp;￥' + zuowei[i].price + '</dnf></p></span>';
                        y += '<span><p>余<b>' + zuoweiNum + '</b>张</p></span>';

                        formHtml += '<form action="{{ url('/station/order') }}" method="post" id="' + item.train_no + item.train_code + zuowei[i].price + i + '">';
                        formHtml += '{{ csrf_field() }}';
                        formHtml += '<input type="hidden" name="train_no" value="' + item.train_no + '">';
                        formHtml += '<input type="hidden" name="train_code" value="' + item.train_code + '">';
                        formHtml += '<input type="hidden" name="start_time" value="' + item.start_time + '">';
                        formHtml += '<input type="hidden" name="arrive_time" value="' + item.arrive_time + '">';
                        formHtml += '<input type="hidden" name="arrive_days" value="' + item.arrive_days + '">';
                        formHtml += '<input type="hidden" name="from_station_name" value="' + item.from_station_name + '">';
                        formHtml += '<input type="hidden" name="to_station_name" value="' + item.to_station_name + '">';
                        formHtml += '<input type="hidden" name="start_station_name" value="' + item.start_station_name + '">';
                        formHtml += '<input type="hidden" name="end_station_name" value="' + item.end_station_name + '">';
                        formHtml += '<input type="hidden" name="train_start_date" value="' + item.train_start_date + '">';
                        formHtml += '<input type="hidden" name="zuowei" value="' + zuowei[i].name + '">';
                        formHtml += '<input type="hidden" name="price" value="' + zuowei[i].price + '">';
                        formHtml += '<input type="hidden" name="run_time" value="' + item.run_time + '">';
                        formHtml += '<input type="hidden" name="from_station_code" value="' + item.from_station_code + '">';
                        formHtml += '<input type="hidden" name="to_station_code" value="' + item.to_station_code + '">';

                        var xo = '<span><p class="xiadan"><a href="javascript:;" onclick="document.getElementById(\'' + item.train_no + item.train_code + zuowei[i].price + i + '\').submit();">下单</a></p></span>';

                        x += formHtml + xo + '</form>';

                    } else if (zuoweiNum == 0) {

                        z += '<span><p>' + zuowei[i].name + '<dnf id="dnf">&nbsp;&nbsp;￥' + zuowei[i].price + '</dnf></p></span>';
                        y += '<span><p>余<b>' + zuoweiNum + '</b>张</p></span>';

                        x += '<span><p class="xiadan" style="color: #4FB6F1"><b >无票</b></p></span>';

                    } else {

                        z += '<span><p>' + zuowei[i].name + '<dnf id="dnf">&nbsp;&nbsp;￥' + zuowei[i].price + '</dnf></p></span>';
                        y += '<span><p>余<b>' + zuoweiNum + '</b>张</p></span>';

                        x += '<span><p class="xiadan" style="color: #4FB6F1"><b >无票</b></p></span>';
                    }

                }

            } else {
                for (var j in zuowei) {

                    z += '<span><p>' + zuowei[j].name + '<dnf id="dnf">&nbsp;&nbsp;￥' + zuowei[j].price + '</dnf></p></span>';
                    /*y += '<span><p>余<b>' + zuowei[j].num + '</b>张</p></span>';*/
                    x = '<span style="font-size: 10px"><p class="xiadan"><a href="javascript:;" >' + payTime + '</a></p></span>';

                    //x =  xq ;
                }

            }
            return '<td class="col-md-2">' +
                z +
                '</td>' +
                '<td class="col-md-2">' +
                y +
                '</td>' +
                '<td class="col-md-1-offset-1">' +
                x +
                '</td>';
        }
        function checkPrice(price) {

            if (price !== "--" && price != "0") {
                return true;
            }
            return false;
        }
    </script>
@endsection
