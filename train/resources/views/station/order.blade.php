<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}"/>
    <script src="{{asset('/js/jquery.min.js')}}"></script>
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('/css/mycss/book.css')}}">
    <title>火车票预订</title>
</head>
<!--头部-->
<body>
@include('partials.top')
@include('partials.logo')
<div class="clearfix">
    <div class="container">
        <div class="row col-md-12">
            <!--左边-->
            <!--面包屑 S-->
            <div class="crumbs">
                <p>
                    <a href="{{url('/station')}}">票务信息&gt;</a>
                    <a href="{{url('#')}}">填写资料</a>

                </p>
            </div>
        </div>
        <div class="pull-left col-md-8">
            <!--车次信息-->
            <div class="panel panel-default" id="panel1">
                <div class="panel-body">
                      <span> <b>车次信息</b>
                          {{-- <a class="pull-right" href="{{url('station')}}">修改车次></a>--}}
                          <hr/>
                       </span>
                    <table class="container" width="100%" cellspacing="0" cellpadding="0">
                        <tbody class="row col-md-12">
                        <tr>
                            <td class=" col-md-3 text_right">
                                <h3>{{ isset($train_code) ? $train_code :'' }}</h3>
                            </td>
                            <td class="col-md-3 text_right">
                                <p class="station">{{ isset($start_time) ? $start_time :'' }}</p>
                                <p class="station">{{ isset($from_station_name) ? $from_station_name :'' }}</p>
                                <p class="date">{{ date("m月d日",strtotime(isset($train_start_date) ? $train_start_date:'')) }}</p>
                            </td>
                            <td class="col-md-3 text_center">
                                <p class="consuming"><i>—</i>{{ isset($run_time)?$run_time:'' }}<i>—</i></p>
                                <p><img style="margin:0 20px" src="{{asset('/img/iconfont-huoche.png')}}"></p>
                            </td>
                            <td class="col-md-3 text_center">
                                <p class="station">{{ isset($arrive_time) ? $arrive_time :'' }}</p>
                                <p class="station">{{ isset($to_station_name) ? $to_station_name :'' }}</p>
                                <p class="date">{{ date("m月d日",strtotime(isset($train_start_date) ? $train_start_date:'') + (isset($arrive_days)?$arrive_days:0) * 24 * 3600 ) }}</p>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <form method="post" action="{{ url('station/order/confirm') }}">
                <!--乘车信息-->
                <div class="panel panel-default clearfix" id="panel2">
                    <div class="panel-body container">
                        <h5>第 <strong> 1 </strong>位乘客</h5>
                        {{ csrf_field() }}

                        @foreach(request()->all() as $k => $v)
                            @if(!in_array($k,['username','card_no','passporttypeseid','_token']))
                                <input type="hidden" name="{{$k}}" value="{{ $v }}">
                            @endif
                        @endforeach
                        <div class="yanzheng">

                            {{--数组形式的参数可能有问题--}}
                            姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名：&nbsp;&nbsp;<input type="text" name="username[1]"
                                                                                      id="userName">
                            <input type="hidden" name="totalfee" id="totalFee">
                        </div>
                        <div class="yanzheng">
                            证件号码：
                            <input type="text" name="card_no[1]" onchange="go()" id="IDMumber">
                            <select name="passporttypeseid[1]">
                                <option value="1">二代身份证</option>
                                <option value="B">护照</option>
                                <option value="G">台湾通行证</option>
                                <option value="C">港澳通行证</option>
                            </select>
                        </div>

                        {{-- <div id="addContainer"></div>--}}
                        <div id="addNum">
                            <a href="#" onclick="ad()" id="addCK"><b style="color: #4cae4c">添加乘客</b></a>
                        </div>

                    </div>
                </div>
                <div style="border: 1px solid #bababa;">
                    <div class="yanzheng"> 手&nbsp;&nbsp;机&nbsp;&nbsp;号：<input type="text" name="mobile" id="mobile">
                        <input type="button" class="btn btn-info" id="yzCode" value="验证码">
                    </div>
                    <div class="yanzheng">
                        验&nbsp;&nbsp;证&nbsp;&nbsp;码：<input type="text" id="yanzheng" name="yzcode">
                    </div>
                    <div class="yanzheng" style="color: red">
                        {{--@if(session('error_tips'))
                            {{ session('error_tips') }}!
                        @endif--}}
                    </div>
                </div>

                <!--提交-->
                <div class="panel panel-default" id="panel3">
                    <div class="panel-heading">
                          <span><input type="checkbox" checked="checked">
                           我已完成阅读<a  data-toggle="modal" data-target="#myModal_trian" href="">《火车票用户平台协议》</a>并接受所有条款
                              &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                              <button type="submit" class="btn btn-warning" id="query">同意以上条款，提交订单</button>
                           </span>
                    </div>
                </div>
            </form>
        </div>
        <!--右边-->
        <div class="pull-right col-md-4">
            <!--温馨提示-->
            <div class="panel panel-default" id="panel4">
                <div class="panel-body">
                    <h4><span><img src="{{asset('/img/wenxin.png')}}">温馨提示
                            </span></h4>
                    1.在线退票时间6:00-22:50，发车30分钟前可在订单详情中申请在线退票，退款1-7个工作日退回原支付账号。非在线退票时间，或已取出纸质票，或离发车时间不足30分钟，凭购票证件原件到车站办理退票，退款7-15个工作日退回原支付账号。退票手续费按照铁路部门规定收取：
                    <a href="http://www.alvft.com/index.php?s=/Home/Page/help/hid/49.htm" target="_blank">更多</a>
                    <br/>
                    2.如需改签，请凭购票证件原件到车站窗口办理，已取出纸质票只能到车站办理。
                    开车前48小时（不含）以上，可改签预售期内的其他车次；开车前48小时以内，可改签票面日期当日24:00之前的其他列车，不办理票面日期次日及以后的改签；开车之后，
                    <a href="http://www.alvft.com/index.php?s=/Home/Page/help/hid/49.htm" target="_blank">更多</a>
                </div>
            </div>
            <!--结算-->
            <div class="panel panel-warning" id="panel5">
                <div class="panel-heading">
                    <h4>结算信息</h4>
                    <span>车票价格</span>
                    <span id="jiage"><strong>¥{{ isset($price)?$price:'0' }}</strong>×<strong
                                id="addNO">1</strong></span>
                </div>
                <div class="panel-body">
                    <h4>订单金额:</h4>
                    <span><strong>¥</strong><strong id="addPrice">{{ isset($price)?$price:'0' }}</strong></span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--footer-->
@include('partials.footer')

</body>
{{--模态框--}}
<!-- 模态框（Modal） -->
{{--滚动条--}}
<style>
    .modal-body{
        height:500px;
        overflow:scroll;
    }
    a:hover{text-decoration: none}
</style>
@include('partials.text')
<script>
    $(function () {
        $("#yzCode").click(function () {
            /* var userName = $("#userName").val();
             if (userName =''){

             }*/

                //向后台发送处理数据
                 var mobile = $("#mobile").val();
            var isMobile=/^(((13[0-9]{1})|(15[0-9]{1})|(18[0-9]{1}))+\d{8})$/;
          if (mobile ===isMobile) {
              alert("请输入手机号");

          } else {
              var InterValObj; //timer变量，控制时间
              var count = 60; //间隔函数，1秒执行
              var curCount;//当前剩余秒数
              curCount = count;
              //设置button效果，开始计时
              $("#yzCode").attr("disabled", "true");
              $("#yzCode").val("请在" + curCount + "秒内输入验证码");
              InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次
              $.get("{{ url('station/order/confirm/yzcode') }}", {mobile: mobile}, function (json) {

                  //console.log(json);
                  if (json.error_code == '0') {
                      alert(json.reason);
                  } else {
                      alert(json.reason);
                  }
              }, 'json');

              function SetRemainTime() {
                  if (curCount == 0) {
                      window.clearInterval(InterValObj);//停止计时器
                      $("#yzCode").removeAttr("disabled");//启用按钮
                      $("#yzCode").val("重新发送验证码");
                  }
                  else {
                      curCount--;
                      $("#yzCode").val("请在" + curCount + "秒内输入验证码");
                  }
              }

          }

        });
    });
</script>
<script>

    $(function () {
        var a = 1;

        $("#addCK").click(function () {
            ++a;
            if (a <= 5) {
                var title = '<h5 style="color: #4cae4c">' + '第' + '<strong>' + a + '</strong>' + '位乘客' + '</h5>';
                var del = '<a class="delChild" href="#">' + '删除' + '</a>';
                var name = '<div class="yanzheng">' + '姓' + '&nbsp;' + '&nbsp;' + '&nbsp;' + '&nbsp;' + '&nbsp;' + '&nbsp;' + '名' + '&nbsp;' + ':' + '<input type="text" name="username[' + a + ']" id="addPassenger">' + '</div>';
                var idCard = '<div class="yanzheng">' + '证件号码:' + '' + '<input type="text" name="card_no[' + a + ']" onchange="go()" id="check">' + '<select name="passporttypeseid[' + a + ']" class="yanzheng">' +
                    '<option + value= "1" >' + '二代身份证' + '</option>' +
                    '<option value="B">' + '护照' + ' </option>' +
                    ' <option value="G">' + '台湾通行证' + '</option>' +
                    '<option value="C">' + '港澳通行证' + '</option>' +
                    +'</select>' + '</div>';

                $("#addNum").before(title, del, name, idCard/*,select*/);
                var addNO = $("#addNO");
                addNO.html(a);
                var addPrice = "{{ isset($price)?$price:'0' }}";
                var add = '';
                add += a * addPrice;
                // console.log(add);

                $("#addPrice").html(add);//把价格写入统计栏中
                $("#totalFee").val(add);//把价格写入统计栏中

                $("#delChild").click(function () {
                    $("#addContainer").remove();
                })
            } else {
                var mixAdd = '<p style="color: red" id="addTip">' + '每位用户最多添加五位用户' + '</p>';
                if (!$("#addTip").text()) {
                    $("#addNum").after(mixAdd);
                }

            }
            //alert(a);
        });
    });
</script>


</html>

