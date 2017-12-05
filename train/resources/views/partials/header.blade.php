<style>
    /*头部*/

    .header {padding:20px 0;}
    .header .logo { width:330px; height:70px; float: left; }
    .header .logo img{margin-left:83%;}
    .header .search { width: 550px; height: 40px; border: 2px solid #fe9c02; float: left; margin-top: 15px; margin-left:17%; border-radius:5px; }
    .header .search .product_select { width: 104px; height:38px; border-right: 2px solid #fe9c02; position: relative; float: left; }
    .header .search .product_select dt { font-size: 12px; display: block; height: 36px; width: 86px; padding-left: 18px; margin-top: 8px; }
    .header .search .product_select dt a,
    .header .search .product_select dt a:visited,
    .header .search .product_select dt a:hover { display: block; color: #666; }
    .header .search .product_select dl { display: block; width: 104px; text-align: center; font-size: 14px; background: #fff; border-top: 1px solid #eee; position: absolute; left: -2px; top: 40px; z-index:16; border: 2px solid #fe9c02; border-top:none;}
    .header .search .product_select dl dd { border-top: 1px solid #eee; }
    .header .search .product_select dl dd a { display: block; }
    .header .search .product_select dl dd:hover { background: #f7f7f7; font-weight: 700; }
    .header .search .product_select a,
    .header .search .product_select a:visited,
    .header .search .product_select a:hover { text-decoration: none; }
    .header .search dt.prico_hide { background:  no-repeat 85px center; }
    .header .search .search_text { float:left; position: relative;}
    .header .search .search_text p { position: absolute; right:1px;top:5px; z-index:1;}
    .header .search .search_text p a,
    .header .search .search_text p a:visited { display: block; height: 20px; line-height:20px; padding: 0 10px; border-radius: 10px; float: left; background: #ededed; color: #999; transition: all .2s linear; margin-right: 9px; }
    .header .search .search_text p a:hover { text-decoration: none; background: #f90; color: #fff; }
    .header .search .search_text input { width: 340px; padding: 0 8px; height: 36px; line-height: 40px; font-family: "微软雅黑"; border: none; color: #999; font-size: 10px; }
    .header .search .search_btn { float: right; }
    .header .search .search_btn input { width: 82px; height: 38px; border: none; background: #fe9c02  no-repeat -13px -45px; cursor: pointer; }
    .header .tel { float: right; padding-left:35px;  margin-top:3px;margin-right: 16%; }
    .header .tel span,
    .header .tel b { display: block; }
    .header .tel span { font-size: 14px; }
    .header .tel b { font-size: 22px;color: #31b0d5;font-weight: bold;}
</style>
<div class="header">
    <div class="logo"><a href="{{ url('/') }}" title="爱旅纷途旅游网">
            <img src="{{asset('/img/logo.png')}}" alt="爱旅纷途旅游网"></a></div>
    <div class="search">
        <div class="product_select">
            <dt>
                旅游线路
            </dt>
        </div>
        <div class="search_text">
            <input type="text" id="key" name="key" value="" placeholder="请输入关键词">
            <p>
                <a href="#">丽江</a>
                <a href="#">桂林</a>
            </p>
        </div>
        <div class="search_btn">
            <input type="submit" id="sub" value="搜索">
        </div>
    </div>
    <div class="tel"> <span>24小时服务热线</span> <b><img src="{{asset('/img/time.png')}}">400-8079798</b> </div>
    <div class="clear">
    </div>
</div>