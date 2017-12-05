<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    @if(Auth::guest())

                        <input class="col-md-6 form-control" name="mobile" type="text" placeholder="手机号" id="mobile">
                        <button class="col-md-7 btn btn-success" type="button" id="sendCode">发送动态验证码</button>

                        {{--<a class="hy_n" href="#--}}{{--{{url('register')}}--}}{{--">注册</a>&nbsp;|&nbsp;
                        <a class="hy_tc" href="#mymodal--}}{{--{{url('login')}}--}}{{--" data-toggle="modal">登录</a>--}}
                    @else

                        <a class="hy_n" href="{{ url('user') }}">{{  Auth::user()->name }}</a>&nbsp;|&nbsp;
                        <a class="hy_n" href="{{ url('logout') }}">退出</a>
                    @endif
                </div>
            </li>
            <li>
                <a class="active-menu" href="user" target="_self"><i class="fa fa-home fa-2x"></i>首页</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-bus fa-2x "></i>火车票<span class="fa arrow fa-2x "></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('/user/order/info')}}"><i class="fa fa-file-text-o"></i>订单详情</a>
                    </li>
                   {{-- <li>
                        <a href="{{url('/user/order/history')}}"><i class="fa fa-code "></i>订单状态</a>
                    </li>--}}
                    <li>
                        <a href="{{url('/user/order/history')}}"><i class="fa fa-copy"></i>历史订单</a>
                    </li>
                    <li>
                        <a href="{{url('/user/order/refund')}}"><i class="fa  fa-exclamation-circle"></i>退票</a>
                    </li>
                    <li>
                        <a href="{{url('/user/order/help')}}"><i class="fa fa-question-circle "></i>帮助中心</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="{{url('/user/order/error')}}"><i class="fa fa-plane fa-2x "></i>飞机票<span class="fa arrow fa-2x"></span></a>
                <!-- <ul class="nav nav-second-level">
                    <li>
                        <a href="panel-tabs.html"><i class="fa fa-toggle-on"></i>Tabs & Panels</a>
                    </li>
                    <li>
                        <a href="notification.html"><i class="fa fa-bell "></i>Notifications</a>
                    </li>
                     <li>
                        <a href="progress.html"><i class="fa fa-circle-o "></i>Progressbars</a>
                    </li>
                     <li>
                        <a href="buttons.html"><i class="fa fa-code "></i>Buttons</a>
                    </li>
                     <li>
                        <a href="icons.html"><i class="fa fa-bug "></i>Icons</a>
                    </li>
                     <li>
                        <a href="wizard.html"><i class="fa fa-bug "></i>Wizard</a>
                    </li>
                     <li>
                        <a href="typography.html"><i class="fa fa-edit "></i>Typography</a>
                    </li>
                     <li>
                        <a href="grid.html"><i class="fa fa-eyedropper "></i>Grid</a>
                    </li>
               </ul>-->
            </li>
            <li>
                <a href="{{url('/user/order/error')}}"><i class="fa fa-yelp fa-2x"></i>旅游 <span class="fa arrow fa-2x"></span></a>
                <!-- <ul class="nav nav-second-level">
                    <li>
                        <a href="message-task.html"><i class="fa fa-recycle "></i>邮件&任务 </a>
                    </li>
                 </ul>-->
            </li>
            <!-- <li>
                <a href="error.html"><i class="fa fa-bug "></i>Error Page</a>
            </li>
            <li>
                <a href="login.html"><i class="fa fa-sign-in "></i>登录</a>
            </li> -->
        </ul>
    </div>
</nav>