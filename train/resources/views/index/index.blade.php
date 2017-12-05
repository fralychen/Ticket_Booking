@extends('layouts.app')
@section('content')
    <style type="text/css">
        *{margin:0;padding:0;list-style-type:none;}
        a,img{border:0;}
        body{font:12px/180% Arial, Helvetica, sans-serif, "新宋体";}
        .iptgroup{width:260px;height:30px;margin:20px auto 10px auto;}
    </style>
    <link rel="stylesheet" href="{{asset('/css/mycss/home.css')}}">
    <!--导航分类-->

    <!--火车票-->
    <div class="bg" align="center" >
        <img src = "{{asset('/img/bj.png')}}" class="img-rounded" style="width:100%;height:500px;">
        <div class="linemask" id="J_PkgInfo">
            <style>
                .form_hd {
                    position: relative;
                    z-index: 2;
                    width: 300px;
                    left: -39px;
                    margin: 0 -1px 18px;
                    padding-left: 1px;
                    padding-top: 10px;
                    border-bottom: 1px solid #bbb;
                    font-size: 0;
                    line-height: 0;
                }
                .form_hd a {
                    position: relative;
                    display: inline-block;
                    margin-right: 6px;
                    margin-bottom: -2px;
                    font: 20px/40px microsoft yahei;
                    color: #fff;
                    text-decoration: none;
                }
                .form_hd .current_tab {
                    border-bottom: 3px solid #5ee425;
                    color: #5ee425;
                }
            </style>
            <div class="form_hd">
                <a href="javascript:(0);" class="current_tab">国内火车票</a>
            </div>
            <div data-type="TK" class="J_PkgInfoItem pkg_info_address">
                <div class="pkg_info_item clearfix">
                    <form id="J_PkgForm" action="{{ url('station') }}" method="get">
                        <input id="dptCode" class="form-control" type="text" value="" size="15"  name="dptCode" mod="address|notice" mod_address_source="hotel" mod_address_suggest="@Beijing|北京|53@Shanghai|上海|321@Shenzhen|深圳|91@Guangzhou|广州|80@Qingdao|青岛|292@Chengdu|成都|324@Hangzhou|杭州|383@Wuhan|武汉|192@Tianjin|天津|343@Dalian|大连|248@Xiamen|厦门|61@Chongqing|重庆|394@" mod_address_reference="cityid" mod_notice_tip="出发地" />
                        <i style="margin-left:170px"><img id="huan" src="{{asset('/img/huan.png')}}"></i>
                        <input class="form-control" id="eptCode" type="text" value="" size="15" name="eptCode" mod="address|notice" mod_address_source="hotel" mod_address_suggest="@Beijing|北京|53@Shanghai|上海|321@Shenzhen|深圳|91@Guangzhou|广州|80@Qingdao|青岛|292@Chengdu|成都|324@Hangzhou|杭州|383@Wuhan|武汉|192@Tianjin|天津|343@Dalian|大连|248@Xiamen|厦门|61@Chongqing|重庆|394@" mod_address_reference="getcityid" mod_notice_tip="到达地" />
                        <span class="iptgroup"><input class="doubledate ipticon form-control"  type="text" readonly="readonly" value="" name="mydate" id="mydate" placeholder="出发日期"></span>
                        <button class="btn btn-warning " style="margin:18px"  id="query">搜索列车</button>
                        <div id="jsContainer" class="jsContainer" style="height: 230px;">
                            <div id="tuna_alert" style="display:none;position:absolute;z-index:999;overflow:hidden;"></div>
                            <div id="tuna_jmpinfo" style="visibility:hidden;position:absolute;z-index:120;"></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--热门火车票-->
    <div class=" clearfix ">
        <div class="panel panel-default" id="panel">
            <div class="panel-body">
                <ul class='clearfix'>
                    <h2>热门火车票</h2>
                    <li  id='block_42925'><a href='#' rel='nofollow'>上海</a></li>
                    <li  id='block_42926'><a href='#' rel='nofollow'>北京</a></li>
                    <li  id='block_47729'><a href='#' rel='nofollow'>南京</a></li>
                    <li  id='block_47790'><a href='#' rel='nofollow'>武汉</a></li>
                    <li  id='block_47792'><a href='#' rel='nofollow'>西安</a></li>
                    <li  id='block_47793'><a href='#' rel='nofollow'>杭州</a></li>
                    <li  id='block_47791'><a href='#' rel='nofollow'>广州</a></li>
                </ul>
                <div class="row col-md-12">
                    <div class="col-md-3 remen">
                        <a href="#"><p>武汉-宜昌<span><i>¥</i>43.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-南昌<span><i>¥</i>47.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-荆州<span><i>¥</i>37.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-苏州<span><i>¥</i>115<em>起</em></span></p></a>
                    </div>
                    <div class="col-md-3 remen">
                        <a href="#"><p>武汉-宜昌<span><i>¥</i>43.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-南昌<span><i>¥</i>47.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-荆州<span><i>¥</i>37.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-苏州<span><i>¥</i>115<em>起</em></span></p></a>
                    </div>
                    <div class="col-md-3 remen">
                        <a href="#"><p>武汉-宜昌<span><i>¥</i>43.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-南昌<span><i>¥</i>47.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-荆州<span><i>¥</i>37.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-苏州<span><i>¥</i>115<em>起</em></span></p></a>
                    </div>
                    <div class="col-md-3 remen">
                        <a href="#"><p>武汉-宜昌<span><i>¥</i>43.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-南昌<span><i>¥</i>47.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-荆州<span><i>¥</i>37.5<em>起</em></span></p></a>
                        <a href="#"><p>武汉-苏州<span><i>¥</i>115<em>起</em></span></p></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--常见问题-->
    <div class=" clearfix ">
        <div class="panel panel-success" id="pane2">
            <div class="panel-heading">
                <a><h2>常见问题</h2></a>
            </div>
            <div class="row col-md-12">
                <div class="col-md-3">
                    <span>身份验证</span>
                    <p>2014年新规：从未在网络购票的用户，
                        请先携身份证去火车站专门窗口核验身份证信息，
                        核验通过后才能网上购票。</p>
                </div>
                <div class="col-md-3">
                    <span>取票方式</span>
                    <p>您使用二代居民身份证预订火车票产品可凭预订时所使用的乘车人证件到车站售
                        票窗口、铁路客票代售点或车站自动售票机上办理换票手续...<a href="http://www.alvft.com/index.php?s=/Home/Page/help/hid/49.htm" target="_blank">更多>></a></p>
                </div>
                <div class="col-md-3">
                    <span>如何退票</span>
                    <p>预订成功后，如未取票且离产品内显示的火车发车时间大于1小时30分钟，
                        您可在线申请退票。预订成
                        功后，如已取票或离产品内显示的火车发车时间小于1小时30分钟...<a href="http://www.alvft.com/index.php?s=/Home/Page/help/hid/49.htm" target="_blank">更多>></a></p>
                </div>
                <div class="col-md-3">
                    <span>如何改签</span>
                    <p>预订成功后，如需办理订单内的车票改签，您须在换取纸质车票后携带预订时所使用的乘车
                        人有效身份证件原件，在列车开车前前往车站改签窗口办续...<a href="http://www.alvft.com/index.php?s=/Home/Page/help/hid/49.htm" target="_blank">更多>></a></p>
                </div>
            </div>

        </div>
    </div>
    </div>
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
    <!--底部-->
    @include('partials.footer')
    <script>
        $(function () {
            /*地点转换*/
            $("#huan").click(function(){
                var init=$("#dptCode").val();//起始地点
                var out=$("#eptCode").val();//终点
                $("#dptCode").val(out);
                $("#eptCode").val(init);
            })
        });
    </script>
    <script type="text/javascript">
        $(function(){
            $('.doubledate').kuiDate({
                className:'doubledate',
                isDisabled: "0"  // isDisabled为可选参数，“0”表示今日之前不可选，“1”标志今日之前可选
            });
        });
    </script>
    <script src="{{asset('js/fixdiv.js')}}"></script>
    <script src="{{asset('js/address.js')}}"></script>
@endsection