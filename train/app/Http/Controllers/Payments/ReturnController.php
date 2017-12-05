<?php

namespace App\Http\Controllers\Payments;

use App\Models\PaymentOrder;
use App\Models\RequestTicketModel;
use App\Models\TrainOrderModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;

class ReturnController extends Controller
{
    const PAY_WAIT = 0;  //待支付状态
    const PAY_SUCCESS = 1; // 支付成功状态
    const CHU_TICKET = 1;//出票成功状态
    const TUI_TICKET = 2;//退票成功状态

    //
    public function index($type)
    {
        if ($type === 'alipay') {
            return $this->alipay();
        }


        throw  new \Exception("什么支付玩意，不认识");
    }

    protected function alipay()
    {
        if (!app('alipay.web')->verify()) {
            Log::notice('Alipay return query data verification fail.', [
                'data' => request()->all()
            ]);
            return "Sorry 支付失败";
        }


        switch (Input::get('trade_status')) {
            case 'TRADE_SUCCESS':
            case 'TRADE_FINISHED':

                $out_trade_no = Input::get('out_trade_no');
                $trade_no = Input::get('trade_no');

                Log::info('订单号是' . $out_trade_no);//支付订单号
                Log::info('支付订单号是' . $trade_no);//支付订单号

                // TODO: 支付成功，取得订单号进行其它相关操作。
                Log::debug('Alipay notify get data verification success.', [
                    'out_trade_no' => Input::get('out_trade_no'),
                    'trade_no' => Input::get('trade_no')
                ]);

                //修改支付订单状态 支付时间
                $payOrder = PaymentOrder::where("out_trade_no", $out_trade_no)->first();

                if ($payOrder->pay_status == self::PAY_WAIT) {

                    $payOrder->pay_time = time();
                    $payOrder->pay_status = self::PAY_SUCCESS;
                    $payOrder->trade_no = Input::get('trade_no');
                    $payOrder->save();

//                dd("恭喜 ！！！！！支付成功");
                    //查询 乘车订单表，得到return_order_id
                    $trainOrder = TrainOrderModel::where("payment_order_id", $payOrder->order_id)->first();
                    $orderid = $trainOrder->return_order_id;

                    // 请求出票 请在此处写代码 ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓

                    $user = Auth::user();//获得当前登录用户
                    $mobile = $user->mobile;


                    $client = new \GuzzleHttp\Client();
                    $result = $client->get(config('juhe.trainTickets.ticketsPay'), [
                        'query' => [
                            'key' => config('juhe.app_key'),
                            'orderid' => $orderid,
                        ]
                    ]);

                    $result_json = json_decode($result->getBody()->getContents());//获取请求出票的返回码

                    if ($result_json->error_code == 0) {//判定是否出票成功


                        //出票成功查询出票状态
                        $queryClient = new \GuzzleHttp\Client();

                        $queryResult = $queryClient->get(config('juhe.trainTickets.ticketsOrderStatus'), [
                            'query' => [
                                'key' => config('juhe.app_key'),
                                'orderid' => $orderid
                            ]
                        ]);
                        //获取请求的数据
                        $query_json = json_decode($queryResult->getBody()->getContents());

                        if ($query_json->result->status == 4) {//判定请求数据的状态

                            $user = new RequestTicketModel;

                            $user->orderid = $result_json->result->orderid;
                            $user->msg = $result_json->result->msg;
                            $user->orderamount = $result_json->result->orderamount;
                            $user->passengers = json_encode($result_json->result->passengers);
                            $user->submit_time = $result_json->result->submit_time;
                            $user->ticket_status = self::CHU_TICKET;
                            $user->finished_time = $result_json->result->finished_time;
                            $user->train_date = $result_json->result->train_date;
                            $user->save();

                            Log::info('支付成功写入 RequestTicketModel');
                            Log::info(json_encode($user));

                            $client = new \GuzzleHttp\Client();

                            //发送请求
                            $client->get(config('juhe.msgUrl'), [
                                'query' => [
                                    'mobile' => $mobile,
                                    'tpl_id' => config('juhe.msgTemplate.order'),
                                    'tpl_value' => urlencode("#code#=$mobile&#company#=爱旅纷途"),
                                    'key' => config('juhe.msgKey')
                                ]
                            ]);
                            return redirect('/user/order');
                        } elseif ($query_json->result->status !== 4) {//出票失败,则重新出票

                            $client = new \GuzzleHttp\Client();
                            $result = $client->get(config('juhe.trainTickets.ticketsPay'), [
                                'query' => [
                                    'key' => config('juhe.app_key'),
                                    'orderid' => $orderid,
                                ]
                            ]);
                            $result_json = json_decode($result->getBody()->getContents());
                            if ($result_json->error_code == 0) {

                                $user = new RequestTicketModel;

                                $user->orderid = $result_json->result->orderid;
                                $user->msg = $result_json->result->msg;
                                $user->orderamount = $result_json->result->orderamount;
                                $user->passengers = json_encode($result_json->result->passengers);
                                $user->submit_time = $result_json->result->submit_time;
                                $user->ticket_status = self::CHU_TICKET;
                                $user->finished_time = $result_json->result->finished_time;
                                $user->train_date = $result_json->result->train_date;
                                $user->save();

                                $client = new \GuzzleHttp\Client();

                                //发送请求
                                $client->get(config('juhe.msgUrl'), [
                                    'query' => [
                                        'mobile' => $mobile,
                                        'tpl_id' => config('juhe.msgTemplate.order'),
                                        'tpl_value' => urlencode("#code#=$mobile&#company#=爱旅纷途"),
                                        'key' => config('juhe.msgKey')
                                    ]
                                ]);
                                return redirect('/user/order/info');
                            }
                        }

                    } else {
                        $result_msg = "支付成功，等待出票";
                    }
                    ////

                    //跳转到订票订单


                    break;
                }
        }

        //return redirect('/user/order');
    }
}