<?php

namespace App\Http\Controllers\Refund;

use App\Models\PaymentOrder;
use App\Models\RequestTicketModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Payment\Common\PayException;
use Payment\RefundContext;

class RefundController extends Controller
{

    const REFUND_WAIT = 0;
    const REDUND_SUCCESS = 1;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        if (Auth::guest()){
            throw  new  \Exception("请登录");
        }
       $user_id=Auth::user()->id;

        //dd(config('latrell-alipay'));
        $refundModel = PaymentOrder::where('uid',$user_id)->get();

       /* foreach ($refundModel as $item){

            $item->order_id = PaymentOrder::where('order_id',$item->order_id)->first();

        }*/
        //dd($refundModel);

        //$refund_order = $refundModel->trade_no;

        //var_dump($refundModel);die;

        $aliconfig = [
            'partner'=>config('latrell-alipay.partner_id'),
            'md5_key'=>config('latrell-alipay-web.key'),
            //'rsa_private_key'=>dirname(__FILE__) . '/key/private_key.pem',
            'notify_url'=>config('app.url') . '/refund_notify/alipay',
            'return_url'=>config('app.url') . '/refund_return/alipay',
            'time_expire'=>'15'

        ] ;

        //生成订单号便于测试
        function  createPayid(){

            $dataOrder = date('Ymdhis', time()).substr(floor(microtime()*1000),0,1).rand(0,9);


            Log::info('用于生成退单号'.$dataOrder);
            Log::info($dataOrder);

            return $dataOrder;

        }

        //$a = [{"ticket_no":"E3857111841030002","passengername":"张仕军","passporttypeseid":"1","passportseno":"411522198903045154"}];退票模拟
        //退款数据

        $reundData  = [
          'refund_no' =>createPayid(),
            'refund_data'=>[
                ['transaction_id' => '2016011421001004330041239366', 'amount'   => '0.01', 'refund_fee' => '0.01', 'reason' => '测试退款']
            ],
        ];
        $refund = new RefundContext();

        try {
            $refund->initRefund(\Payment\Config::ALI,$aliconfig);
            $ret = $refund->refund($reundData);

        }catch (PayException $e){

            echo $e->errorMessage();exit;
        }

        //跳转支付宝
        header("Location:{$ret}");


    }


    protected function createRefundOrder(Request $request){
        if (Auth::guest()){
            throw new \Exception("请登录");
        }
        $user_id = Auth::user()->id;

        $refundOrder = new RequestTicketModel();

        $refundOrder->uid = $user_id;
        $refundOrder->ticket_status = self::REDUND_SUCCESS;
        $refundOrder->refund_time = time();

        $refundOrder->save();
        Log::info($refundOrder);

        return $refundOrder;
    }

}
