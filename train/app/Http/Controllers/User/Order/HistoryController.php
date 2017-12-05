<?php

namespace App\Http\Controllers\User\Order;

use App\Models\PaymentOrder;
use App\Models\TrainOrderModel;
use App\Models\TrainsModel;
use Illuminate\Http\Request;




use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function __construct()
    {
        //判断用户是否登录,如果用户没有登录,就跳转到登录页面
        $this->middleware('auth');
    }

    //
    public function index(){


        //获取登录用户的模型实例
        $user = Auth::user();

        $uid = $user -> id;
        //dd($uid);

        //历史订单实例的集合
        $trainsModel  = TrainsModel::where('uid',$uid)->orderBy('id','desc')->get();


        foreach ($trainsModel as $item){//遍历订单集合
            //解码用户信息json格式
            $item->passengers_decode = json_decode($item->passengers);


            //查询用户订单对应的车票订单号
            $item->order_info  = TrainOrderModel::where('trains_id',$item->id)->first();

            if($item->order_info){//判定订单号是否存在
                //取出对应订单的订单状态
                $item->order_info->order = PaymentOrder::where('order_id',$item->order_info->payment_order_id)->first();
            }
        }
        //跳转到视图页面
        return  view("user.order.history",[
            'trainsModel'=>$trainsModel,

        ]);
    }
}
