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
    <link rel="stylesheet" href="{{asset('/css/mobile/amazeui.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/mobile/jedate.css')}}">
    <link rel="stylesheet" href="{{asset('/css/mobile/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('/css/mobile/wap.css')}}">
    <script src="{{asset('/js/mobile/jquery.min.js')}}"></script>
    <script src="{{asset('/js/mobile/jquery.jedate.min.js')}}"></script>
    <script src="{{asset('/js/mobile/amazeui.min.js')}}"></script>
    <title>票务详情</title>
</head>
<script type="text/javascript">
    $(function () {
        /*日期*/
        $("#test").jeDate({
            trigger: false,
            skinCell: "jedategreen",
            format: 'YYYY年MM月DD日',
            zIndex: 3000
        });
    });
</script>
<body>
<!--头部-->
<header data-am-widget="header" class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="{{url('/mobile')}}" class="">
            <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        <a href="#title-link" class="">
            <p>广州→深圳</p>
        </a>
    </h1>
</header>
<!--日期选择-->
<div class="am-input-group am-datepicker-date">
                      <span class="am-input-group-btn am-datepicker-add-on">
                        <button class="am-btn am-btn-success" type="button"><span
                                    class="am-icon-calendar"></span> </button>
                      </span>

    <input id="test" type="text" class="am-form-field" placeholder="选择日期" readonly>
    <form action="{{url('mobile')}}">
        <input type="hidden" id="dptCode" value="{{isset($dptName) ? $dptName :''}}" name="dptCode">
        <input type="hidden" id="eptCode" value="{{ isset($eptName) ? $eptName :'' }}" name="eptCode">
        <input type="hidden"id="date"  value="{{  isset($date) ? $date :''}}">
    </form>
</div>

            <section data-am-widget="accordion" class="am-accordion am-accordion-gapped ">

            </section>


<section data-am-widget="accordion" class="am-accordion am-accordion-gapped " >
    <button class="am-btn am-btn-warning am-btn-block" id="button" >
        <i class="am-icon-spinner am-icon-spin"></i>
        正在加载中……
    </button>
</section>


    <div data-am-widget="gotop" class="am-gotop am-gotop-default">
        <a href="#top" title="回到顶部">
            <span class="am-gotop-title">回到顶部</span>
            <i class="am-gotop-icon am-icon-chevron-up"></i>
        </a>
    </div>

</body>
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
        var dptime = $("#date").val();

        //console.log(dptime);
        //获取出发地输入框的值
        var dptCode = $("#dptCode").val();

        //获取目的地输入框的值
        var eptCode = $("#eptCode").val();

        //console.log(dptCode);
        //console.log(eptCode);
        if (dptCode || eptCode) {
            //定义拼接参数
            var params = {
                'tickets': 1,  // 这里自定义参数
                'Dptime': dptime,  // 这里是日期参数
                'dptCode': dptCode,  // 这里就是始发站代号参数
                'eptCode': eptCode  //这里就是终点站代号参数
            };

            console.log(params);
            $("section #button").val();

            $.get("{{ url('station') }}", params, function (data) {
                if (data.error_code === 0) {
                    var lists = data.result.list;
                   // console.log(lists);
                    var row = '';
                    var rowStart = '<section section data-am-widget="accordion" class="am-accordion am-accordion-gapped"><dl class="am-accordion-item am-active  am-g "><dd  class="am-accordion-bd am-collapse am-g train_dengzuo "><dt class="am-accordion-title am-in' +
                        '"   >';
                    var rowEnd = '</dd></dd></dl></section>';
                    for (var i in lists) {
                        var div = "";
                        div+='<div class="am-accordion-content trian_main_infor">'
                        div += '<div class="am-u-sm-4 trian_form_info">' + '<div class="trian_date">'+lists[i].start_time+'</div>' +'<div class="trian_city">'+lists[i].from_station_name+'</div>'+ '</div>';
                        div += '<div class="am-u-sm-4 ">' + '<div class="trian_on">'+lists[i].train_code+'</div>' +'<div class="trian_qu"></div>'+'<div class="trian_take">'+lists[i].run_time+'</div>'+ '</div>';
                        div += '<div class="am-u-sm-4 am-u-end trian_to_info">' +'<div class="trian_date">'+lists[i].arrive_time+'</div>'+ '<div class="trian_city">'+lists[i].to_station_name +'</div>'+'</div>';
                        div += getOrder(lists[i]);
                        div+='</div>'
                        row += rowStart+div +'</dd>' +rowEnd;
                    }
                    $("section").html(row);
                } else {
                    $("section").html(data.reason);
                }
            }, 'json');
        } else {
            /* alert("请输入出发站、终点站");*/
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
        var w = ""; //价格
        var payTime = item.note;
        //console.log(payTime);
        if (!payTime) {
            for (var i in zuowei) {
                var zuoweiNum = zuowei[i].num;


                //console.log(zuoweiNum);
                //console.log(item.train_code, zuowei[i].name, zuowei[i].price, zuoweiNum);
                if (zuoweiNum > 0) {
                    var formHtml = "";
                    z += '<span><p>' + zuowei[i].name + '</p></span>';
                    w += '<span><p>' + '<dnf><i class="am-icon-rmb"></i>' + zuowei[i].price + '</dnf></p></span>';
                    y += '<span><p><b>' + zuoweiNum + '</b>张</p></span>';

                    formHtml += '<form action="{{ url('mobile/station/order') }}" method="" id="' + item.train_no + item.train_code + zuowei[i].price + i + '">';
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
/*<a href="javascript:;" onclick="document.getElementById(\'' + item.train_no + item.train_code + zuowei[i].price + i + '\').submit();">下单</a>*/
                    var xo = '<span><p>' +
                        '<button  type="button" class="am-btn am-btn-warning  am-radius am-btn-xs"  onclick="document.getElementById(\'' + item.train_no + item.train_code + zuowei[i].price + i + '\').submit();">下单</button>' +
                        '</p></span>';

                    x += formHtml + xo + '</form>';

                } else if (zuoweiNum == 0) {

                    z += '<span><p>' + zuowei[i].name + '</p></span>';
                    w += '<span><p>' + '<dnf><i class="am-icon-rmb"></i>' + zuowei[i].price + '</dnf></p></span>';
                    y += '<span><p><b>' + zuoweiNum + '</b>张</p></span>';

                    x += '<span><p class="xiadan" style="color: #4FB6F1"><b >无票</b></p></span>';

                } else {

                    z += '<span><p>' + zuowei[i].name + '</p></span>';
                    w += '<span><p>' + '<dnf><i class="am-icon-rmb"></i>' + zuowei[i].price + '</dnf></p></span>';
                    y += '<span><p><b>' + zuoweiNum + '</b>张</p></span>';

                    x += '<span><p class="xiadan" style="color: #4FB6F1"><b >无票</b></p></span>';
                }
            }

        } else {
            for (var j in zuowei) {

                z += '<span><p>' + zuowei[i].name + '</p></span>';
                w += '<span><p>' + '<dnf><i class="am-icon-rmb"></i>' + zuowei[i].price + '</dnf></p></span>';
                x = '<span style="font-size: 10px"><p class="xiadan"><a href="javascript:;" >' + payTime + '</a></p></span>';

            }

        }
        return '<hr data-am-widget="divider" style="" class="am-divider am-divider-soild" />'+'<a></a>'+'<dd class="am-g  am-u-sm-3">' +
            z +
            '</dd>' +
            '<dd class="am-u-sm-3">' +
            w +
            '</dd>'+
            '<dd class="am-u-sm-3">' +
            y +
            '</dd>' +
            '<dd class="am-u-sm-3 am-u-end">' +
            x +
            '</dd>';
    }
    function checkPrice(price) {

        if (price !== "--" && price != "0") {
            return true;
        }
        return false;
    }
</script>
</html>