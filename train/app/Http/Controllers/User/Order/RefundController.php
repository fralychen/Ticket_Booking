<?php

namespace App\Http\Controllers\User\Order;

use App\Models\PaymentOrder;
use App\Models\RequestTicketModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RefundController extends Controller
{
    const CHU_TICKET = 1;//出票成功状态
    const TUI_TICKET = 2;//退票成功状态

    protected function index(){


        $user = Auth::user();

        $userID = $user->id;
        //dd($userID);

        $refundModel  = RequestTicketModel::where('id',$userID)->first();//获取用户支付成功订单表记录
        $refundModel2  = PaymentOrder::where('uid',$userID)->first();//获取
        /*var_dump($refundModel);
        echo '<hr>';*/
        //dd($refundModel2);
        $trade_no = $refundModel2->trade_no;
        $price = $refundModel2->total_fee;
        //dd($trade_no);

        $detail_data = $trade_no."^".($price-$price*0.05)."^"."协商退款";//拼接detail_data数据
        $passengers = json_decode($refundModel2->passengers);
        //dd($detail_data);

        $client = new \GuzzleHttp\Client();

        $result = $client->get(config('juhe.trainTickets.ticketsRefund'),[
            'query' => [
                'key'=> config('juhe.app_key'),
                'orderid'=> $refundModel->orderid,
                'tickets'=> $passengers
            ]
        ]);
        $result_json = json_decode($result->getBody()->getContents());

        if ($result_json->result->status ==6){
            $clientcheck = new \GuzzleHttp\Client();

            $resultckeck = $clientcheck->get(config('juhe.trainTickets.ticketsOrderStatus'),[
                'query' => [
                    'key' => config('juhe.app_key'),
                    'orderid' => $refundModel->orderid
                ]
            ]);
            $query_json = json_decode($resultckeck->getBody()->getContents());
            if ($query_json->result->status == 6){

                $refundModel->refund_time = time();
                $refundModel->ticket_status = self::TUI_TICKET;
                $refundModel->save();

                Log::info('程序运行到refundModel');
                Log::info($refundModel);

                $mun = time().rand(1000,99999);
                dd($mun);

                $client = new \GuzzleHttp\Client();

                $result = $client->post('https://mapi.alipay.com/gateway.do',[
                    'query' => [
                        'service'=>'refund_fastpay_by_platform_nopwd',
                        'partner'=>config('latrell-alipay.return.partner_id'),
                        '_input_charset'=>'utf8',
                        'sign_type'=>'MD5',
                        'sign'=>'MD5',
                        'notify_url'=>'',
                        'seller_email'=>config('latrell-alipay.return.seller_id'),
                        'seller_user_id'=>date('Y-m-d h:i:s',time()),
                        'batch_no'=>$mun,
                        'batch_num'=>'1',
                        'detail_data'=>$detail_data,
                    ]
                ]);

                return view('/user/order/refund');

            }

        }


    }


}
