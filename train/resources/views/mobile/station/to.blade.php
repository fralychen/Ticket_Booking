<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <script src="{{asset('/js/mobile/jquery.min.js')}}"></script>
    <script src="{{asset('/js/mobile/jquery.cookie.js')}}"></script>
    <title>目的地</title>
    <style type="text/css">
        body{background:white;position:relative;-webkit-tap-highlight-color:rgba(0,0,0,0);max-width: 600px;margin: 0 auto;}
        body,div,dl,dt,dd,ul,li,form,input,button,h1,h2,h3,h4,h5,h6,p{margin: 0 auto;padding:0;font-family:"微软雅黑";}
        html{overflow-x:hidden;-webkit-text-size-adjust:none;}
        ul,li,dl,dt,dd{display:block;list-style:none;}
        img{border:0;max-width:100%;height: auto;}
        .clear{background:none;border:0;clear:both;display:block;float:none;font-size:0;overflow:hidden;visibility:hidden;width:0;height:0;}
        a{text-decoration:none;outline:none;}
        .fl{float:left;}
        .fr{float:right;}
        .none{display:none;}

    </style>
    <link href="{{asset('/css/mobile/style.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript">
        function setCookie(c_name,value,expiredays)
        {
            var exdate=new Date()
            exdate.setDate(exdate.getDate()+expiredays)
            document.cookie=c_name+ "=" +escape(value)+
                ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
        }
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
            return ""
        }
        $(function(){
            $(".city-list p").click(function(){
                var toCity =$(this).text();
                //setCookie("outcity",citys,7);
                window.location.href = "{{url('mobile')}}"+'?'+'toCity'+'='+ toCity;
            })
        })
    </script>
</head>
<body>
<div class="loan_jm1">
    <ul>
        <li class="loan_jm_l1">
            <span class="loan_jm_spa1">更多城市</span>
            <span class="wbk_srn select_show select_gr" id="gr_zone_ids" data-id="130100"></span><b></b>
        </li>
    </ul>
</div>

<div class="container" style="z-index: 9999; ">
    <div class="city">
        <div class="city-list"><span class="city-letter" id="A1">A</span>
            <p data-id="410500">安阳</p>
            <p data-id="455000">安阳东</p>
            <p data-id="610900">安康</p>
            <p data-id="">鞍山</p>
            <p data-id="">鞍山西</p>
            <p data-id="520400">安顺</p>
            <p data-id="">安顺西</p>
            <p data-id="340800">安庆</p>
            <p data-id="">安庆西</p>
            <p data-id="">鳌江</p>
            <p data-id="652900">阿克苏</p>
            <p data-id="210300">安达</p>
            <p data-id="210300">安陆</p>
            <p data-id="">阿城</p>
            <p data-id="">安家</p>
            <p data-id="">安亭北</p>
            <p data-id="">安仁</p>
            <p data-id="">阿金</p>
            <p data-id="">安化</p>
            <p data-id="">安图</p>
        </div>
        <div class="city-list"><span class="city-letter" id="B1">B</span>
            <p data-id="110100">北京</p>
            <p data-id="">北京西</p>
            <p data-id="">北京南</p>
            <p data-id="">北京东</p>
            <p data-id="">北京北</p>
            <p data-id="">北宅</p>
            <p data-id="">八达岭</p>
            <p data-id="130600">保定</p>
            <p data-id="">保定东</p>
            <p data-id="">白沟</p>
            <p data-id="">白洋淀</p>
            <p data-id="">白涧</p>
            <p data-id="">百里峡</p>
            <p data-id="340300">蚌埠</p>
            <p data-id="">蚌埠南</p>
            <p data-id="150200">包头</p>
            <p data-id="">包头东</p>
            <p data-id="150200">白云鄂博</p>
            <p data-id="610300">宝鸡</p>
        </div>
        <div class="city-list"><span class="city-letter" id="C1">C</span>
            <p data-id="510100">成都</p>
            <p data-id="">成都东</p>
            <p data-id="">成都南</p>
            <p data-id="430100">长沙</p>
            <p data-id="">长沙南</p>
            <p data-id="">陈相屯</p>
            <p data-id="500100">重庆</p>
            <p data-id="">重庆北</p>
            <p data-id="">长寿北</p>
            <p data-id="">长寿</p>
            <p data-id="">重庆南</p>
            <p data-id="">长寿湖</p>
            <p data-id="220100">长春</p>
            <p data-id="">长春西</p>
            <p data-id="">长春南</p>
            <p data-id="">柴岗</p>
        </div>
        <div class="city-list"><span class="city-letter" id="D1">D</span>
            <p data-id="210200">大连</p>
            <p data-id="">大连北</p>
            <p data-id="">登沙河</p>
            <p data-id="441900">东莞</p>
            <p data-id="">东莞东</p>
            <p data-id="511700">达州</p>
            <p data-id="371400">德州</p>
            <p data-id="">德州东</p>
            <p data-id="140200">大同</p>
            <p data-id="140200">大涧</p>
            <p data-id="210600">丹东</p>
            <p data-id="">东港北</p>
            <p data-id="">大孤山</p>
            <p data-id="">丹东西</p>
            <p data-id="">大堡</p>
            <p data-id="">石城</p>
        </div>
        <div class="city-list"><span class="city-letter" id="E1">E</span>
            <p data-id="422800">恩施</p>
            <p data-id="420700">鄂州</p>
            <p data-id="">鄂州东</p>
            <p data-id="150600">鄂尔多斯</p>
            <p data-id="">阿克苏</p>
            <p data-id="">阿城</p>
            <p data-id="">峨眉山</p>
            <p data-id="">峨眉</p>
            <p data-id="">峨边</p>
            <p data-id="">阿金</p>
            <p data-id="">阿图什</p>
            <p data-id="">阿克陶</p>
            <p data-id="">二连</p>
            <p data-id="">阿巴嘎旗</p>
            <p data-id="">阿尔山</p>
            <p data-id="">阿尔山北</p>
            <p data-id="">阿里河</p>
            <p data-id="">阿龙山</p>
            <p data-id="">二道湾</p>
            <p data-id="">二龙山屯</p>
        </div>
        <div class="city-list"><span class="city-letter" id="F1">F</span>
            <p data-id="350100">福州</p>
            <p data-id="">福州南</p>
            <p data-id="350181">福清</p>
            <p data-id="341200">阜阳</p>
            <p data-id="">阜南</p>
            <p data-id="440600">佛山</p>
            <p data-id="361000">抚州</p>
            <p data-id="">抚州东</p>
            <p data-id="">抚州北</p>
            <p data-id="">福田</p>
            <p data-id="210900">阜新南</p>
            <p data-id="">福鼎</p>
            <p data-id="">福安</p>
            <p data-id="">丰城</p>
            <p data-id="">丰南</p>
            <p data-id="450600">防城港北</p>
            <p data-id="">扶余</p>
            <p data-id="">扶余北</p>
            <p data-id="">涪陵</p>
        </div>
        <div class="city-list"><span class="city-letter" id="G1">G</span>
            <p data-id="440100">广州</p>
            <p data-id="">广州南</p>
            <p data-id="">广州东</p>
            <p data-id="">广州北</p>
            <p data-id="">广州西</p>
            <p data-id="360700">赣州</p>
            <p data-id="">贵阳</p>
            <p data-id="">贵阳北</p>
            <p data-id="">贵安</p>
            <p data-id="450300">桂林市</p>
            <p data-id="">桂林北</p>
            <p data-id="">桂林西</p>
            <p data-id="">恭城</p>
            <p data-id="510800">广元</p>
            <p data-id="">桂平</p>
            <p data-id="450800">贵港</p>
        </div>
        <div class="city-list"><span class="city-letter" id="H1">H</span>
            <p data-id="330100">杭州</p>
            <p data-id="">杭州东</p>
            <p data-id="">杭州南</p>
            <p data-id="230100">哈尔滨</p>
            <p data-id="">哈尔滨西</p>
            <p data-id="">哈尔滨东</p>
            <p data-id="">哈尔滨北</p>
            <p data-id="">呼兰</p>
            <p data-id="340100">合肥</p>
            <p data-id="">合肥南</p>
            <p data-id="">合肥北城</p>
            <p data-id="">合肥西</p>
            <p data-id="">汉口</p>
            <p data-id="">贺胜桥东</p>
            <p data-id="">后湖</p>
            <p data-id="430400">衡阳</p>
            <p data-id="">衡阳东</p>
            <p data-id="">衡阳西</p>
            <p data-id="">衡山</p>
            <p data-id="">衡南</p>
        </div>
        <div class="city-list"><span class="city-letter" id="J1">J</span>
            <p data-id="370100">济南</p>
            <p data-id="">济南西</p>
            <p data-id="">济南东</p>
            <p data-id="330700">金华</p>
            <p data-id="">金华南</p>
            <p data-id="360400">九江</p>
            <p data-id="210700">锦州</p>
            <p data-id="">锦州南</p>
            <p data-id="360800">吉安</p>
            <p data-id="">井冈山</p>
            <p data-id="330400">嘉兴</p>
            <p data-id="">嘉兴南</p>
            <p data-id="">嘉善</p>
            <p data-id="">嘉善南</p>
            <p data-id="350582">晋江</p>
            <p data-id="220200">吉林</p>
            <p data-id="">蛟河西</p>
            <p data-id="">蛟河</p>
            <p data-id="421000">荆州</p>
            <p data-id="">京山</p>
            <p data-id="421000">吉舒</p>
        </div>
        <div class="city-list"><span class="city-letter" id="K1">K</span>
            <p data-id="530100">昆明</p>
            <p data-id="">昆明南</p>
            <p data-id="">昆阳</p>
            <p data-id="">昆明西</p>
            <p data-id="320583">昆山</p>
            <p data-id="">昆山南</p>
            <p data-id="410200">开封</p>
            <p data-id="">开封北</p>
            <p data-id="">凯里</p>
            <p data-id="">凯里南</p>
            <p data-id="">开原</p>
            <p data-id="">开原西</p>
            <p data-id="">库尔勒</p>
            <p data-id="653100">喀什</p>
            <p data-id="">奎屯</p>
            <p data-id="">葵潭</p>
            <p data-id="650200">克拉玛依</p>
            <p data-id="">库车</p>
            <p data-id="">开通</p>
            <p data-id="">克山</p>
        </div>
        <div class="city-list"><span class="city-letter" id="L1">L</span>
            <p data-id="450200">柳州</p>
            <p data-id="">柳江</p>
            <p data-id="">鹿寨北</p>
            <p data-id="">鹿寨</p>
            <p data-id="620100">兰州</p>
            <p data-id="">兰州西</p>
            <p data-id="">兰州东</p>
            <p data-id="620100">兰州新区</p>
            <p data-id="">龙泉寺</p>
            <p data-id="">骆驼巷</p>
            <p data-id="410300">洛阳</p>
            <p data-id="410300">洛阳龙门</p>
            <p data-id="410300">洛阳东</p>
            <p data-id="411100">漯河</p>
            <p data-id="">漯河西</p>
            <p data-id="141000">临汾</p>
            <p data-id="341500">六安</p>
            <p data-id="431300">娄底</p>
            <p data-id="">娄底南</p>
            <p data-id="">涟源</p>
        </div>
        <div class="city-list"><span class="city-letter" id="M1">M</span>
            <p data-id="510700">绵阳</p>
            <p data-id="231000">牡丹江</p>
            <p data-id="">穆棱</p>
            <p data-id="">磨刀石</p>
            <p data-id="">马莲河</p>
            <p data-id="">马桥河</p>
            <p data-id="440900">茂名</p>
            <p data-id="">茂名西</p>
            <p data-id="">名权</p>
            <p data-id="">名权北</p>
            <p data-id="">麻城</p>
            <p data-id="">麻城北</p>
            <p data-id="340500">马鞍山</p>
            <p data-id="">马鞍山东</p>
            <p data-id="441400">梅州</p>
            <p data-id="511400">眉山</p>
            <p data-id="">眉山东</p>
            <p data-id="511400">梅河口</p>
            <p data-id="511400">汨罗</p>
            <p data-id="">汨罗东</p>
        </div>
        <div class="city-list"><span class="city-letter" id="N1">N</span>
            <p data-id="320100">南京</p>
            <p data-id="">南京南</p>
            <p data-id="360100">南昌</p>
            <p data-id="">南昌西</p>
            <p data-id="450100">南宁</p>
            <p data-id="">南宁东</p>
            <p data-id="">南宁西</p>
            <p data-id="">那铺</p>
            <p data-id="">那罗</p>
            <p data-id="">宁村</p>
            <p data-id="330200">宁波</p>
            <p data-id="">宁海</p>
            <p data-id="">宁波东</p>
            <p data-id="511300">南充</p>
            <p data-id="">南部</p>
            <p data-id="">南充北</p>
            <p data-id="411300">南阳</p>
            <p data-id="">南召</p>
            <p data-id="">内乡</p>
            <p data-id="320600">南通</p>
        </div>
        <div class="city-list"><span class="city-letter" id="P1">P</span>
            <p data-id="">普宁</p>
            <p data-id="360300">萍乡</p>
            <p data-id="">萍乡北</p>
            <p data-id="">盘锦北</p>
            <p data-id="211100">盘锦</p>
            <p data-id="">平南南</p>
            <p data-id="410400">平顶山</p>
            <p data-id="">平顶山西</p>
            <p data-id="">邳州</p>
            <p data-id="">平果</p>
            <p data-id="510400">攀枝花</p>
            <p data-id="">平遥</p>
            <p data-id="">平遥古城</p>
            <p data-id="">蒲城东</p>
            <p data-id="">蒲城</p>
            <p data-id="620800">平凉</p>
            <p data-id="">平凉南</p>
            <p data-id="">普兰店</p>
            <p data-id="350300">普湾</p>
            <p data-id="530800">皮口</p>
        </div>
        <div class="city-list"><span class="city-letter" id="Q1">Q</span>
            <p data-id="370200">青岛</p>
            <p data-id="">青岛北</p>
            <p data-id="350500">泉州</p>
            <p data-id="">泉州东</p>
            <p data-id="130300">秦皇岛</p>
            <p data-id="230200">齐齐哈尔</p>
            <p data-id="">齐齐哈尔南</p>
            <p data-id="330800">衢州</p>
            <p data-id="530300">曲靖</p>
            <p data-id="">曲靖北</p>
            <p data-id="">青州市</p>
            <p data-id="">曲阜东</p>
            <p data-id="">曲阜</p>
            <p data-id="429005">潜江</p>
            <p data-id="441800">清远</p>
            <p data-id="">祁阳</p>
            <p data-id="">祁阳北</p>
            <p data-id="">祁东</p>
            <p data-id="">祁东北</p>
            <p data-id="450700">钦州东</p>
        </div>
        <div class="city-list"><span class="city-letter" id="R1">R</span>
            <p data-id="">瑞安</p>
            <p data-id="">任丘</p>
            <p data-id="">日照</p>
            <p data-id="">瑞金</p>
            <p data-id="">饶平</p>
            <p data-id="">汝州</p>
            <p data-id="">瑞昌</p>
            <p data-id="">容桂</p>
            <p data-id="320682">如皋</p>
            <p data-id="">如东</p>
            <p data-id="371082">荣成</p>
            <p data-id="">乳山</p>
            <p data-id="">荣昌北</p>
            <p data-id="">荣昌</p>
            <p data-id="">仁布</p>
            <p data-id="542301">日喀则</p>
            <p data-id="">榕江</p>
            <p data-id="">饶阳</p>
            <p data-id="">融水</p>
            <p data-id="">融安</p>
        </div>
        <div class="city-list"><span class="city-letter" id="S1">S</span>
            <p data-id="310100">上海</p>
            <p data-id="">上海虹桥</p>
            <p data-id="">上海南</p>
            <p data-id="">上海西</p>
            <p data-id="">松江</p>
            <p data-id="">松江南</p>
            <p data-id="440300">深圳</p>
            <p data-id="">深圳北</p>
            <p data-id="">深圳东</p>
            <p data-id="">深圳西</p>
            <p data-id="">深圳坪山</p>
            <p data-id="210100">沈阳</p>
            <p data-id="">沈阳北</p>
            <p data-id="">沈阳南</p>
            <p data-id="">苏家屯</p>
            <p data-id="">深井子</p>
            <p data-id="">沈阳东</p>
            <p data-id="">世博园</p>
            <p data-id="">石家庄</p>
            <p data-id="">石家庄北</p>
        </div>
        <div class="city-list"><span class="city-letter" id="T1">T</span>
            <p data-id="">天津</p>
            <p data-id="">天津西</p>
            <p data-id="">天津南</p>
            <p data-id="">天津北</p>
            <p data-id="">塘沽</p>
            <p data-id="140100">太原</p>
            <p data-id="">太原南</p>
            <p data-id="">太原东</p>
            <p data-id="">太原北</p>
            <p data-id="130200">唐山</p>
            <p data-id="">唐山北</p>
            <p data-id="">同江</p>
            <p data-id="">台州</p>
            <p data-id="370900">泰安</p>
            <p data-id="">泰山</p>
            <p data-id="620500">天水</p>
            <p data-id="150500">通辽</p>
            <p data-id="211200">铁岭</p>
        </div>
        <div class="city-list"><span class="city-letter" id="W1">W</span>
            <p data-id="420100">武汉</p>
            <p data-id="">武昌</p>
            <p data-id="">乌龙泉南</p>
            <p data-id="320200">无锡</p>
            <p data-id="">无锡东</p>
            <p data-id="">无锡新区</p>
            <p data-id="370700">潍坊</p>
            <p data-id="330300">温州</p>
            <p data-id="">温州南</p>
            <p data-id="650100">乌鲁木齐</p>
            <p data-id="">乌鲁木齐南</p>
            <p data-id="">乌西</p>
            <p data-id="340200">芜湖</p>
            <p data-id="">无为</p>
            <p data-id="610500">渭南</p>
            <p data-id="">渭南北</p>
            <p data-id="">韦庄</p>
            <p data-id="">渭南南</p>
            <p data-id="">温岭</p>
            <p data-id="">万州</p>
        </div>
        <div class="city-list"><span class="city-letter" id="X1">X</span>
            <p data-id="610100">西安</p>
            <p data-id="">西安北</p>
            <p data-id="">西安南</p>
            <p data-id="350200">厦门</p>
            <p data-id="">厦门北</p>
            <p data-id="350200">厦门高崎</p>
            <p data-id="320300">徐州</p>
            <p data-id="">徐州东</p>
            <p data-id="">新沂</p>
            <p data-id="411500">信阳</p>
            <p data-id="">信阳东</p>
            <p data-id="">新县</p>
            <p data-id="">息县</p>
            <p data-id="420600">襄阳</p>
            <p data-id="420600">襄阳东</p>
            <p data-id="630100">西宁</p>
            <p data-id="410700">新乡</p>
            <p data-id="">新乡东</p>
            <p data-id="130500">邢台</p>
            <p data-id="">邢台东</p>
        </div>
        <div class="city-list"><span class="city-letter" id="Y1">Y</span>
            <p data-id="330782">义乌</p>
            <p data-id="">永康</p>
            <p data-id="">永康南</p>
            <p data-id="">宜春</p>
            <p data-id="">宜春西</p>
            <p data-id="">岳阳</p>
            <p data-id="">岳阳东</p>
            <p data-id="370600">烟台</p>
            <p data-id="">烟台南</p>
            <p data-id="420500">宜昌</p>
            <p data-id="">宜昌东</p>
            <p data-id="431100">永州</p>
            <p data-id="360600">鹰潭</p>
            <p data-id="">鹰潭北</p>
            <p data-id="">余江</p>
            <p data-id="640100">银川</p>
            <p data-id="450900">玉林</p>
            <p data-id="610600">延安</p>
            <p data-id="330281">余姚</p>
            <p data-id="">余姚北</p>
        </div>
        <div class="city-list"><span class="city-letter" id="Z1">Z</span>
            <p data-id="410100">郑州</p>
            <p data-id="">郑州东</p>
            <p data-id="">郑州西</p>
            <p data-id="">中牟</p>
            <p data-id="370300">淄博</p>
            <p data-id="430200">株洲</p>
            <p data-id="">株洲西</p>
            <p data-id="">株洲南</p>
        </div>
    </div>
    <div class="letter">
        <ul>
            <li><a href="javascript:;">A</a></li>
            <li><a href="javascript:;">B</a></li>
            <li><a href="javascript:;">C</a></li>
            <li><a href="javascript:;">D</a></li>
            <li><a href="javascript:;">E</a></li>
            <li><a href="javascript:;">F</a></li>
            <li><a href="javascript:;">G</a></li>
            <li><a href="javascript:;">H</a></li>
            <li><a href="javascript:;">J</a></li>
            <li><a href="javascript:;">K</a></li>
            <li><a href="javascript:;">L</a></li>
            <li><a href="javascript:;">M</a></li>
            <li><a href="javascript:;">N</a></li>
            <li><a href="javascript:;">P</a></li>
            <li><a href="javascript:;">Q</a></li>
            <li><a href="javascript:;">R</a></li>
            <li><a href="javascript:;">S</a></li>
            <li><a href="javascript:;">T</a></li>
            <li><a href="javascript:;">W</a></li>
            <li><a href="javascript:;">X</a></li>
            <li><a href="javascript:;">Y</a></li>
            <li><a href="javascript:;">Z</a></li>
        </ul>
    </div>
</div>

<script type="text/javascript" src="{{asset('/js/mobile/zepto.js')}}"></script>
<script type="text/javascript">
    //加载城市事件
    $('body').on('click', '#zone_ids,#gr_zone_ids', function () {
        var zid = $(this).attr('id');
        $('.container').show();

    });
    //选择城市 start
    $('body').on('click', '.city-list p', function () {
        var type = $('.container').data('type');
        $('#zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
        $('#gr_zone_ids').html($(this).html()).attr('data-id', $(this).attr('data-id'));
        $('.container').hide();
    });
    $('body').on('click', '.letter a', function () {
        var s = $(this).html();
        $(window).scrollTop($('#' + s + '1').offset().top);
    });
</script>


<Script language="javascript">
    function GetRequest() {

        var url = location.search; //获取url中"?"符后的字串
        var theRequest = new Object();
        if (url.indexOf("?") != -1) {
            var str = url.substr(1);
            strs = str.split("&");
            for(var i = 0; i < strs.length; i ++) {
                theRequest[strs[i].split("=")[0]]=(strs[i].split("=")[1]);
            }
        }
        return theRequest;
    }
</Script>
</body>
</html>

