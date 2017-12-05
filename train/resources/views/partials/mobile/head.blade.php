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
    <script src="{{asset('/js/mobile/amazeui.min.js')}}"></script>
    <script src="{{asset('/js/mobile/jquery.cookie.js')}}"></script>
    <script src="{{asset('/js/mobile/jquery.jedate.min.js')}}"></script>
    <title>首页</title>
</head>
<script type="text/javascript">
    function getCookie(c_name)
    {
        if (document.cookie.length>0)
        {
            c_start=document.cookie.indexOf(c_name + "=")

            if (c_start!=-1)
            {
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)

                if (c_end==-1) c_end=document.cookie.length

                return unescape(document.cookie.substring(c_start,c_end))
            }
        }
    }
    $(function () {
        /*地点转换*/
        $("#huan").click(function(){
            var init=$("#dptCode").html();//起始地点
            var out=$("#eptCode").html();//终点
            $("#dptCode").html(out);
            $("#eptCode").html(init);
        })
        /*日期*/
        $("#nodate").jeDate({
            trigger:false,
            skinCell:"jedategreen",
            format: 'YYYY-MM-DD',
            zIndex:3000
        });
        if(getCookie("city")==null)
        {
            $("#dptCode").text("北京");
        }else
        {

            $("#dptCode").text(getCookie("city"));

        }
        if(getCookie("outcity")==null)
        {

            $("#eptCode").text("武汉");
        }else
        {
            $("#eptCode").text(getCookie("outcity"));

        }
    });
</script>
