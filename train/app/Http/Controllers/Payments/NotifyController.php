<?php

namespace App\Http\Controllers\Payments;

use App\Models\PaymentOrder;
use App\Models\TrainOrderModel;
use App\Models\UserModel;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

class NotifyController extends Controller
{
    const PAY_WAIT = 0;  //待支付状态
    const PAY_SUCCESS = 1; // 支付成功状态

    //
    public function index($type)
    {
        if ($type === 'alipay') {
            return $this->alipay();
        }


        throw  new \Exception("无法识别的支付功能");
    }

    protected function successOrder($mobile)
    {

        $user = UserModel::where("mobile", $mobile)->first();

        $client = new \GuzzleHttp\Client();

        $result = $client->get(config('juhe.msgUrl'), [
            'query' => [
                'mobile' => $user,
                'tpl_id' => config('juhe.msgTemplate.order'),
                'tpl_value' => urlencode("#company#=爱旅纷途"),
                'key' => config('juhe.msgKey')
            ]
        ]);

        $json = json_decode($result->getBody()->getContents());
        if (intval($json->error_code) === 0) {

        }
    }

    protected function alipay()
    {
        // 验证请求。
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay notify post data verification fail.', [
                'data' => Request::instance()->getContent()
            ]);
            return 'fail';
        }

        // 判断通知类型。
        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':
                $out_trade_no = Input::get('out_trade_no');
                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify post data verification success.', [
                    'out_trade_no' => Input::get('out_trade_no'),
                    'trade_no' => Input::get('trade_no')
                ]);

                //修改支付订单状态 支付时间
                //修改支付订单状态 支付时间

                $payOrder = PaymentOrder::where("out_trade_no", $out_trade_no)->first();


                if ($payOrder->pay_status == self::PAY_WAIT) {

                    $payOrder->pay_time = time();
                    $payOrder->pay_status = self::PAY_SUCCESS;
                    $payOrder->save();

//                dd("恭喜 ！！！！！支付成功");

                    //查询 乘车订单表，得到return_order_id
                    $trainOrder = TrainOrderModel::where("payment_order_id", $payOrder->order_id)->first();
                    $orderid = $trainOrder->return_order_id;

                    // 请求出票 请在此处写代码 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

                    /* $client = new \GuzzleHttp\Client();
                     $result = $client->get(config('juhe.trainTickets.ticketsPay'),[
                         'query'=>[
                             'key'=>config('juhe.app_key'),
                             'orderid'=>$orderid,
                         ]
                     ]);

                     $result_json = json_decode($result->getBody()->getContents());

                     if($result_json->error_code == 0){
                         $result_msg = "支付成功，等待出票";

                     }else{
                         $result_msg = "支付成功，等待出票";
                     }*/
                }

                break;
        }

        return 'success';
    }
}
