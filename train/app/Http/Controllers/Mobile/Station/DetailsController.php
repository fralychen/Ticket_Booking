<?php

namespace App\Http\Controllers\Mobile\Station;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DetailsController extends Controller
{
    private $_codePrefix = 'm_';

    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    public function index(Request $request){

        //dd($request->all());


        return view('mobile.station.details');
    }

    public function detailsConduct(Request $request){


        $from_station_name = $request->input('from_station_name');
        $train_code = $request->input('train_code');
        $start_time = $request->input('start_time');
        $train_start_date = $request->input('train_start_date');
        $run_time = $request->input('run_time');
        $price = $request->input('price');
        $to_station_name = $request->input('to_station_name');
        $arrive_time = $request->input('arrive_time');
        $zuowei = $request->input('zuowei');
        $fareName = $request->input('fareName');
        $card_num = $request->input('card_num');
        $from_station_code = $request->input('from_station_code');
        $to_station_code = $request->input('to_station_code');
        $train_start_date = $request->input('train_start_date');
        $user_order_id = uniqid(date('Ymd') . "_");

        //格式化时间戳
        date('Y-m-d',$train_start_date);

        dd($train_start_date);

        //$userName = $request->input('username');

        $passengers = [];

            array_push($passengers,[
                'passengerid' => 1,
                'passengersename' => '张仕军',
                'piaotype' => 1,
                'piaotypename' => '成人票',
                'passporttypeseid' =>'1',
                'passporttypeseidname' =>$this->getPassportTypeName('1'),
                'passportseno' => '411522198903045154',
                'price' =>$price,
                'zwcode' =>$this->getZuoWeiCode($zuowei),
                'zwname' => $zuowei
            ]);

        //dd($passengers);

        $pramstrain = [] ;

        $pramstrain['from_station_name'] = $from_station_name;
        $pramstrain['start_time'] = $start_time;
        $pramstrain['train_start_date'] = $train_start_date;
        $pramstrain['run_time'] = $run_time;
        $pramstrain['price'] = $price;
        $pramstrain['to_station_name'] = $to_station_name;
        $pramstrain['arrive_time'] = $arrive_time;
        $pramstrain['price'] = $zuowei;
        $pramstrain['train_code'] = $train_code;
        $pramstrain['fareName'] = $fareName;
        $pramstrain['card_num'] = $card_num;

        $passengers_json = json_encode($passengers);

        $client = new \GuzzleHttp\Client();

        $request  = $client->post(config('juhe.trainTickets.ticketsSubmit'),[
            'query' =>[
                "key" => config('juhe.trainTickets.key'),
                "user_orderid" => $user_order_id,
                "train_date" => date('Y-m-d',),
                "from_station_code" => $from_station_code,
                "to_station_code" =>$to_station_code,
                "passengers" => $passengers_json
            ]
        ]);



        return view('mobile.station.details',$pramstrain);

    }

    public function iii(){

    }
    public function getZuoWeiCode($name){

        $codes = [
            '9' => '商务座',
            'P' => '特等座',
            'M' => '一等座',
            'O' => '二等座',
            '6' => '高级软卧',
            '4' => '软卧',
            '3' => '硬卧',
            '2' => '软座',
            '1' => '硬座',
        ];

        $arr = array_flip($codes);

        return isset($arr[$name]) ? $arr[$name] : '';

    }

    public function getPassportTypeName($id){

        //1:二代身份证,2:一代身份证,C:港澳通行证,B:护照,G:台湾通行证
        $codes = [
            '1' => '二代身份证',
            '2' => '一代身份证',
            'C' => '港澳通行证',
            'B' => '护照',
            'G' => '台湾通行证',
        ];

        return isset($codes[$id]) ? $codes[$id] : '';
    }
}
