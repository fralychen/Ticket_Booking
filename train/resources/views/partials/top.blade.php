<style>
    /*头部工具条*/
    /*微信手机*/
    .menu {
        position:relative;
    }
    .menu img{display:none;z-index:3;width:85px;height:88px;}
    .menu:hover img{
        display:block;
        position: absolute; left: 0px; top:40px;
    }
    .TopSoft { width:100%; height:40px; border-bottom: 1px solid #e4e4e4; background: #f8f8f8; float: left; }
    .main { width:1200px; margin: 0 auto ; position:relative;}
    .WelcomeText { line-height:40px; float:left;margin-left:-50px; }
    .TopSoft .main .soft {float:right;}
    .TopSoft .soft li { float: left;height:40px; padding:0 10px;  position: relative;  }
    .TopSoft .soft a,
    .TopSoft .soft a:visited,
    .TopSoft .soft a:hover { text-decoration:none; }
    dl, ul ,li{ list-style: none }
</style>
<div class="TopSoft">
        <div class="main">
                <div class="WelcomeText">
                    爱旅纷途票务预订系统
                </div>
                <div class="soft">
                    <ul>
                        <li class="hidden-md">
                            <font id="_Check_head_Login">
                                @if(Auth::guest())
                                    {{--<a  href="#--}}{{--{{url('register')}}--}}{{--">注册</a>&nbsp;|&nbsp;--}}
                                    <a  href="{{--{{url('login')}}--}}" data-target="#mymodal" data-toggle="modal">&nbsp登录</a>
                                @else

                                    <a  href="{{ url('/user/order/info') }}">{{  Auth::user()->name }}</a>&nbsp;|&nbsp;
                                    <a  href="{{ url('logout') }}">退出</a>
                                @endif

                            </font>
                        </li>
                            <li>
                                <div class="menu"><i class="fa fa-wechat fa-2x" style="color:#bce8f1;">
                                    </i>&nbsp;微信我们
                                      <img src="{{asset("/img/rwm.png")}}">
                                </div>
                            </li>
                            <li><div class="menu">
                                <i class="fa fa-mobile-phone fa-2x" style="color:#bce8f1;" ></i>&nbsp;扫描访问手机站
                                <img src="{{asset('/img/s_sj.png')}}">
                                </div>
                            </li>
                    </ul>
                </div>
        </div>
</div>
