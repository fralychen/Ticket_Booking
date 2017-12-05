<?php

namespace App\Http\Controllers\Payments;


use App\Models\PaymentOrder;
use App\Models\TrainOrderModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PayController extends Controller
{
    const PAY_WAIT = 0;  //待支付状态
    const PAY_SUCCESS = 1; // 支付成功状态

    //支付请求
    public function index($type, Request $request)
    {
        //支付宝支付
        if ($type === 'alipay') {
            //创建支付订单
            $order = $this->createPaymentOrder($request, $type);
            //发起支付请求
            return $this->alipay($order);
        }


        //微信支付
        if ($type === 'weixin') {
            $this->createPaymentOrder($request, $type);
            return $this->weixin($request);
        }


        throw  new \Exception("暂未开通此支付功能");
    }

    /**
     * 发起支付宝支付请求
     * @param $order
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function alipay($order)
    {
        $alipay = app('alipay.web');
        $alipay->setOutTradeNo($order->out_trade_no);
        //$alipay->setTotalFee(0.01);//测试金额
        $alipay->setTotalFee($order->total_fee);
        $alipay->setSubject($order->subject);
        $alipay->setBody($order->body);
//        $alipay->setQrPayMode(4);

        return redirect()->to($alipay->getPayLink());
    }


    /**
     * 发起微信支付请求
     * @param Request $request
     */
    protected function weixin(Request $request)
    {

    }

    /**
     * 创建支付订单
     * @param Request $request
     * @param $payType
     * @return PaymentOrder
     * @throws \Exception
     */
    protected function createPaymentOrder(Request $request, $payType)
    {
        //接受价格
        //$price = $_SESSION['price'];

        $trains_params = session('trains_params');
//
//        var_dump($trains_params);
//        dd();

        if (Auth::guest()) {
            throw  new  \Exception("请登录");
        }

        //用户编号
        $user_id = Auth::user()->id;

        $payOrder = new PaymentOrder();
        $payOrder->uid = $user_id;
        $payOrder->out_trade_no = uniqid("alvft_{$user_id}_", true);
        $payOrder->total_fee = $trains_params['price'];
        $payOrder->subject = $trains_params['from_station_name'] . ' - ' . $trains_params['to_station_name'] . '  购票日期:' . $trains_params['train_start_date'];
        $payOrder->body = $trains_params['from_station_name'] . ' - ' . $trains_params['to_station_name'] . '  购票日期:' . $trains_params['train_start_date'];
        $payOrder->pay_type = $payType;
        $payOrder->pay_time = 0;
        $payOrder->order_time = time();
        $payOrder->pay_status = self::PAY_WAIT;
        $payOrder->save();


        $trainOrder = TrainOrderModel::where("id", $trains_params['train_order']->id)->first();
        $trainOrder->payment_order_id = $payOrder->order_id;
        $trainOrder->save();

        //记录日志
        Log::info($payOrder);

        return $payOrder;
    }

}
