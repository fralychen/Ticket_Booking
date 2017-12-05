<!DOCTYPE html>
<html>
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
    <link rel="stylesheet" href="{{asset('/css/mobile/wap.css')}}">
    <script src="{{asset('/js/mobile/jquery.min.js')}}"></script>
    <script src="{{asset('/js/mobile/jquery.cookie.js')}}"></script>
    <script src="{{asset('/js/mobile/jquery.jedate.min.js')}}"></script>

    <script src="{{asset('/js/mobile/amazeui.min.js')}}"></script>
    <title>首页</title>
</head>
<script type="text/javascript">
    function getCookie(c_name) {
        if (document.cookie.length > 0) {
            c_start = document.cookie.indexOf(c_name + "=")

            if (c_start != -1) {
                c_start = c_start + c_name.length + 1
                c_end = document.cookie.indexOf(";", c_start)

                if (c_end == -1) c_end = document.cookie.length

                return unescape(document.cookie.substring(c_start, c_end))
            }
        }
    }
    $(function () {
        /*地点转换*/
        $("#huan").click(function () {
            var init = $("#dptCode").val();//起始地点
            var out = $("#eptCode").val();//终点
            $("#dptCode").val(out);
            $("#eptCode").val(init);
        })
        /*日期*/
        $("#nodate").jeDate({
            trigger: false,
            skinCell: "jedategreen",
            format: 'YYYY-MM-DD',
            zIndex: 3000
        });

    });
</script>
<body>
@include('partials.mobile.head')
@include('partials.mobile.header')

<!--回到顶部-->
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="">
        <img class="am-gotop-icon-custom" src="{{asset('/img/mobile/goTop.png')}}"/>
    </a>
</div>
@include('partials.mobile.slider')
<div class="pet_mian" id="top">
    <!--火车票查询-->
    <!--选项卡-->
    <div class="am-tabs" data-am-tabs>
        <ul class="am-tabs-nav am-nav am-nav-tabs">
            <li class="am-active"><a href="#tab1" class="am-icon-train">火车票</a></li>
            <!--  <li><a href="#tab2" class="am-icon-plane">飞机票</a></li>-->
        </ul>
        <div class="am-tabs-bd">
            <!--火车票-->
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                <form action="{{url('mobile/station/train')}}" method="get">
                    <div class="am-cf" id="form">
                        <ul class="am-g am-text-center">
                            <li class="am-u-sm-4">
                    <span class="">
                        <p class="am-kai">出发地</p>
                        <div class="btn-loading-example" type="text" id="dptCode"
                             onclick="location.href='{{url('mobile/station/dptcode')}}'">{{$formCity}}</div>
                        <input type="hidden" value="哈尔滨" id="formStation" name="dptCode">
                    </span>
                            </li>
                            <li class="am-u-sm-4 ">
                                <div class="am-icon-btn am-icon-exchange am-success" id="huan"></div>
                            </li>
                            <li class="am-u-sm-4 am-u-end">
                                <span class="">
                                    <p class="am-kai">到达地</p>
                                    <div class="btn-loading-example" type="text" id="eptCode"
                                         onclick="location.href='{{url('mobile/station/eptcode')}}'">{{$toCity}}</div>
                                    <input type="hidden" id="toStation" value="哈尔滨东" name="eptCode">
                                </span>
                            </li>
                            <li class="am-u-sm-12 ">
                                <hr data-am-widget="divider" class="am-divider am-divider-default"/>
                                <!--日期选择-->
                                <div class="am-input-group trian_input">
                     	    <span class="am-input-group-btn am-datepicker-add-on">
                                <button class="am-btn am-btn-success trian_input_button" type="button">
                                    <span class="am-icon-calendar">
                                    </span>
                                </button>
                            </span>
                                    <input type="text" id="nodate" name="Dptime" class="am-form-field" placeholder="出发日期" readonly/>
                                </div>
                                <hr data-am-widget="divider" style="" class="am-divider am-divider-default"/>
                                <button type="submit" id="button" class="am-btn am-btn-success am-s am-monospace">
                                    火车票查询
                                </button>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>

        </div>
    </div>

    @include('partials.mobile.footer')
</div>
</div>
</body>
<script>
    $(function () {
        $("#button").click(function () {
            var dptCode = $("#formStation").val();
            var eptCode = $("#toStation").val();

            /* alert(eptCode);
             alert(dptCode);*/

            console.log(eptCode);

            //var formStation = $("#formStation")
        });

    });
</script>
</html>


