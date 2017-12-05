<?php

namespace App\Http\Controllers\Mobile\Station;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;


class OrderController extends Controller
{
    public function index(Request $request){



        //


        //dd($request->all());
        $fareName = $request->input('fareName');
        $ticket_type = $request->input('ticket_type');
        $card_type = $request->input('card_type');
        $card_num = $request->input('card_num');


        //火车信息参数

        $train_no = $request->input('train_no');

        //车次代号
        $train_code = $request->input('train_code');

        //出发时间
        $start_time = $request->input('start_time');
        //到达时间
        $arrive_time = $request->input('arrive_time');
        $train_start_date = $request->input('train_start_date');

        //到达站
        $from_station_name = $request->input('from_station_name');
        $to_station_name = $request->input('to_station_name');
        //座位
        $zuowei = $request->input('zuowei');
        //票价
        $from_station_code = $request->input('from_station_code');
        $to_station_code = $request->input('to_station_code');
        $price = $request->input('price');
        //运行时间
        $run_time = $request->input('run_time');
        //出发时间
        $train_start_date = $request->input('train_start_date');


        $session = new Session();

       /* $session->set('price', $price);
        $ss = $session->get('price');
        dd($ss);*/
        $pramstrain = [];
        $pramstrain['train_no'] = $train_no ;
        $pramstrain['train_code'] = $train_code ;
        $pramstrain['start_time'] = $start_time ;
        $pramstrain['arrive_time'] = $arrive_time ;
        $pramstrain['from_station_name'] = $from_station_name ;
        $pramstrain['to_station_name'] = $to_station_name ;
        $pramstrain['zuowei'] = $zuowei ;
        $pramstrain['run_time'] = $run_time ;
        $pramstrain['price'] = $price ;
        $pramstrain['train_start_date'] = $train_start_date ;
        $pramstrain['train_start_date'] = $train_start_date ;
        $pramstrain['train_start_date'] = $train_start_date ;
        $pramstrain['from_station_code'] = $from_station_code ;
        $pramstrain['to_station_code'] = $to_station_code ;
        $pramstrain['train_start_date'] = $train_start_date ;
        //dd($pramstrain);

        //dd($train_no);



        //拼接参数
       session(['pramstrain'=>$pramstrain]);

       //sedd(session('pramstrain')['train_start_date']);

        $prams[] = '';
        $prams['fareName'] = $fareName;
        $prams['ticket_type'] = $ticket_type;
        $prams['card_type'] = $card_type;
        $prams['card_num'] = $card_num;
        session(['prams'=>$prams]);
        //dd($ss['prams']);


        return view('mobile.station.order');
    }
}
