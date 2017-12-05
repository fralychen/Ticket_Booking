<?php

namespace App\Http\Controllers\Station;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PayController extends Controller
{
    //
    public function index(Request $request)
    {
        $trains_params = session('trains_params');

//        var_dump($trains_params);

        return view('station.pay', $trains_params);
    }


    public function orderStatus()
    {

        $trains_params = session('trains_params');

        $return_order_id = $trains_params['train_order']->return_order_id;

        $client = new \GuzzleHttp\Client();

        $return = $client->get(config('juhe.trainTickets.ticketsOrderStatus'), [
            'query' => [
                'key' => config('juhe.app_key'),
                'orderid' => $return_order_id,
            ]
        ]);

        //订单状态查询结果对象
        $order_json = json_decode($return->getBody()->getContents());

        //查询账号余额是否足以支付
        $balance = $client->get(config('juhe.balanceUrl'), [
            'query' => [
                'key' => config('juhe.app_key'),
            ]
        ]);

        //账号余额查询结果对象
        $balance_json = json_decode($balance->getBody()->getContents());
        //账户余额
        $account_balance = floatval($balance_json->result);

        $ticket_price = floatval($trains_params['price']);


        if ($account_balance < $ticket_price) {
            return response()->json([
                "reason" => "系统账户余额不足，不能完成支付，请联系管理员",
                "result" => [
                    'status' => -1,
                    'msg' => '系统账户余额不足，不能完成支付',
                ],
                "error_code" => 0
            ]);
        }

        if ($order_json->result->status == '2') {
            return response()->json((array)$order_json);
        }

        return response()->json((array)$order_json);

    }
}
