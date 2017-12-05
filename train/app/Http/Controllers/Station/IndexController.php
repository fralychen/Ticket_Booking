<?php

namespace App\Http\Controllers\Station;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(Request $request)
    {

//请求余票列表
        if ($request->has('tickets')) {
            return $this->getList(
                $request->input('dptCode', ''),
                $request->input('eptCode', ''),
                $request->input('Dptime', '')
            );
        }

        //获取出发站的值
        $dpcode = $request->input('dptCode', '');

        //获取到达站的值
        $epcode = $request->input('eptCode', '');

        //获取出发日期
        $date = $request->input('mydate', '');

        //站名换简码
        $codes = $this->getCodes($dpcode, $epcode);

//        dd($codes);

        //获取简码的值
        $dptCode = $codes['dptCode'];
        $eptCode = $codes['eptCode'];

        //传递到页面的参数
        $assigns = [];
        $assigns['dptCode'] = $dptCode;
        $assigns['dptName'] = $dpcode;
        $assigns['eptCode'] = $eptCode;
        $assigns['eptName'] = $epcode;
        $assigns['date'] = $date;

//        dd($assigns);

        return view("station.index", $assigns);
    }


    /**
     * 获取余票列表
     * @param $dptCode
     * @param $eptCode
     * @param $date
     * @return string
     */
    public function getList($dptCode, $eptCode, $date)
    {

        //站名换简码
        $codes = $this->getCodes($dptCode, $eptCode);

        //获取简码的值
        $dptCode = $codes['dptCode'];
        $eptCode = $codes['eptCode'];

        //获取key
        $key = config('juhe.trainTickets.key');

        $queryUrl = config('juhe.trainTickets.ticketsAvailable');

        //实例化请求对象
        $client = new \GuzzleHttp\Client();
        //拼接参数
        $result = $client->post($queryUrl, [
            'query' => [
                'key' => $key,
                'train_date' => $date,
                'from_station' => $dptCode,
                'to_station' => $eptCode,
            ]
        ]);

        return $result->getBody()->getContents();
    }


    /**
     * 站名换简码
     * @param $dptName
     * @param $eptName
     * @return array
     */
    public function getCodes($dptName, $eptName)
    {

        //获取key
        $key = config('juhe.trainTickets.key');

        //设置请求地址
        $queryUrl = config('juhe.trainTickets.ticketsCityCode');
        //创建发送请求对象
        $client = new \GuzzleHttp\Client();
        //拼接参数
        $result1 = $client->get($queryUrl, [
            'query' => [
                'stationName' => $dptName,
                'key' => $key,

            ]
        ]);
        $result2 = $client->request('GET', $queryUrl, [
            'query' => [
                'stationName' => $eptName,
                'key' => $key,

            ]
        ]);

        //发送请求
        $json1 = $result1->getBody()->getContents();
        $json2 = $result2->getBody()->getContents();

        //解码json
        $data1 = json_decode($json1);
        $data2 = json_decode($json2);

        //返回简码的值
        return [
            'dptCode' => isset($data1->result->code) ? $data1->result->code : '',
            'eptCode' => isset($data2->result->code) ? $data2->result->code : '',
        ];
    }
}
