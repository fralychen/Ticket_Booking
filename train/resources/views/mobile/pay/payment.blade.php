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
    <link rel="stylesheet" href="css/amazeui.min.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/wap.css">
    <title>支付宝支付</title>
</head>
<body>
<!--头部-->
<header data-am-widget="header" class="am-header am-header-default">
    <div class="am-header-left am-header-nav">
        <a href="details.html" class="" >
            <i class="fa fa-angle-left fa-2x" aria-hidden="true"></i>
        </a>
    </div>
    <h1 class="am-header-title">
        支付宝支付
    </h1>
</header>
<!--折叠面板-->
<section data-am-widget="accordion" class="am-accordion am-accordion-gapped pay_panle " data-am-accordion='{  }'>
    <dl class="am-accordion-item  am-g">
            <dt class="am-accordion-title">
                           <span class="pay_fukuan"><h4>应付金额:</h4>
                           <dnf>
                              355.00￥
                            </dnf>
                            <p>总票价305￥+优选服务费50￥</p>
                             </span>
            </dt>
        <dd class="am-accordion-bd am-collapse ">
            <div class="am-panel-bd">
                <p><b class="pay_zhifucheci">车次：</b >K973 汉口-随州</p>
                <p><b class="pay_zhifucheci">出发时间：</b >2017-05-19 05:00</p>
                <p><b  class="pay_zhifucheci">到达时间：</b >2017-05-19 06:57</p>
            </div>

        </dd>
    </dl>
    <dl class="am-accordion-item  am-g ">
        <dt class="am-accordion-title ">
            乘客信息
        </dt>
        <dd class="am-accordion-bd am-collapse ">
            <!-- 规避 Collapase 处理有 padding 的折叠内容计算计算有误问题， 加一个容器 -->
            <div class="am-accordion-content pay_cdtime">
                <div class=""><p><b class="pay_name">张三</b>成人票</p>
                    <p>身份证：4*****************6
                        <b class="am-align-right">硬座</b></p>
                </div><hr/>
                <div>
                    <p><b class="pay_name">李四</b>成人票</p>
                    <p>身份证：4*****************2
                        <b class="am-align-right">硬座</b></p>
                </div>
            </div>
        </dd>
    </dl>
</section>
<!--footer-->
<div class="am-navbar am-navbar-default">
    <ul class="am-navbar-nav">
        <li>
            <a href="#">
                支付宝支付
            </a>
        </li>
    </ul>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/amazeui.min.js"></script>
</body>
</html>
