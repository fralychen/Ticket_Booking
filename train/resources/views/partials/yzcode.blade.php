<form action="{{url('/alogin')}}" method="post">
    {{csrf_field()}}
    <div class="col-md-10 col-md-offset-1 myMP">
        <span id="yanzheng">
             @if(Auth::guest())

                <input class="col-md-6 form-control" name="mobile" type="text" placeholder="手机号" id="mobile">
                <button class="col-md-7 btn btn-success" type="button" id="sendCode">发送动态验证码</button>

                {{--<a class="hy_n" href="#--}}{{--{{url('register')}}--}}{{--">注册</a>&nbsp;|&nbsp;
                <a class="hy_tc" href="#mymodal--}}{{--{{url('login')}}--}}{{--" data-toggle="modal">登录</a>--}}
            @else

                <a class="hy_n" href="{{ url('user') }}">{{  Auth::user()->name }}</a>&nbsp;|&nbsp;
                <a class="hy_n" href="{{ url('logout') }}">退出</a>
            @endif

        </span>
    </div>
    <div class="col-md-10 col-md-offset-1 myMP">
        <input class="form-control" type="text" placeholder="动态验证码" name="code" id="reCode">
        <div class="yanzheng" style="color: red">
            @if(session('error_tips'))
                {{ session('error_tips') }}
            @endif
        </div>
    </div>
   {{-- <div class="col-md-10 col-md-offset-1 myMP">
        <input type="checkbox"/>下次自动登录
    </div>--}}
    <div class="col-md-12 myB">
        <input class="btn btn-primary form-control" type="submit" value="登录">
    </div>
</form>
<script>
    $(function () {
        $("#sendCode").click(function () {
            var mobile = $("#mobile").val();
            if (mobile){
                $.get("{{url('station/order/confirm/yzcode')}}",{mobile:mobile},function (json) {
                    console.log(json);
                    if (json.error_code == '0'){
                        alert(json.reason)
                    }else {
                        alert(json.reason)
                    }
                });
            }else {
                alert("请输入手机号");
            }
        });

    });
</script>