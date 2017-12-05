<style>
    dnf{color: orange;font-size: 1.2em;
    }
</style>
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">退票成功<i class="fa fa-check-circle-o " style="color:deepskyblue;"></i></h1>
                <h1 class="page-subhead-line">退票详情</h1>
            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-md-12 col-xs-12" >
                <div class="panel  panel-info" >
                    <div class="panel-heading" >
                        <span>业务流水号:<b><dnf>E2456789yy</dnf></b></span>
                        <p class="pull-right"><i class="fa fa-trash"></i></p>
                    </div>
                    <div class="panel-body ">
                        <div class="col-md-3 col-xs-6">
                            <p class="station">乘车日期</p>
                            <dnf> 2017-05-08</dnf>
                        </div>
                        <div class="col-md-3  col-xs-6" >
                            <p class="station">车次</p>
                            <dnf>K740</dnf>
                        </div>
                        <div class="col-md-3  col-xs-6">
                            <p>票款原价</p>
                            <dnf>268.5</dnf>
                        </div>
                        <div class="col-md-3 col-xs-6 " >
                            <p>应退票款<p/>
                            <dnf>255.0元</dnf>(按<dnf>5%</dnf>收取退票手续费)
                        </div>
                        <div class="col-md-12  col-xs-6 ">
                            <button type="button" class="pull-right btn btn-default" data-dismiss="modal" onclick="window.location.href='{{url("/")}}'">继续购票
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>