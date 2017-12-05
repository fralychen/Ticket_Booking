<?php

namespace App\Http\Controllers\User\Order;

use App\Models\PaymentOrder;
use App\Models\TrainOrderModel;
use App\Models\TrainsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = Auth::user();

        $uid = $user ->id;

        $trainsModel = TrainsModel::where('uid',$uid)->orderBy('id','desc')->get();

        foreach ($trainsModel as $item){
            $item->passengers_decode = json_decode($item->passengers);

            $item->order_info = TrainOrderModel::where('trains_id',$item->id)->first();
            if ($item->order_info){
                $item->order_info->order = PaymentOrder::where('order_id',$item->order_info->payment_order_id)->first();
            }
        }
        return view("user.order.info",[
            'trainsModel'=>$trainsModel
        ]);
    }
}
