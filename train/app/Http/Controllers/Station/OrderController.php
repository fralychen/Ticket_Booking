<?php

namespace App\Http\Controllers\Station;

use App\Models\TrainOrderModel;
use App\Models\TrainsModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    private $_codePrefix = 'm_';

    public function __construct()
    {
        /*$this->middleware('auth');*/
    }

    //
    public function index(Request $request)
    {
        //        var_dump($_POST);die;
        session([$this->_codePrefix . '18999999999' => '9999']);

        return view('station.order', $request->all());
    }

    public function confirm(Request $request)
    {
        //dd($request->all());

        $userName = $request->input('username');
        $train_no = $request->input('card_no');
        $totalfee = $request->input('totalfee');
        $passporttypeseid = $request->input('passporttypeseid');
        //dd($passporttypeseid);
        $passengers = [];
        foreach ($userName as $key => $val) {

            array_push($passengers, [
                'passengerid' => $key,
                'passengersename' => $val,
                'piaotype' => 1,
                'piaotypename' => '成人票',
                'passporttypeseid' => $passporttypeseid[$key],
                'passporttypeseidname' => $this->getPassportTypeName($passporttypeseid[$key]),
                'passportseno' => $train_no[$key],
                'price' => $request->input('price'),
                'zwcode' => $this->getZuoWeiCode($request->input('zuowei')),
                'zwname' => $request->input('zuowei')
            ]);

        }


        //var_dump($passengers);

        //dd($request->all()


        if ($this->checkCode(
            $request->input('mobile'),
            $request->input('yzcode')
        ))
        {

            $this->checkMobile($request->input('mobile'),
                $request->input('yzcode'));

            $user_order_id = uniqid(date('Ymd') . "_");
            $train_date = date('Y-m-d', strtotime($request->input('train_start_date')));
            $from_station_code = $request->input('from_station_code');
            $to_station_code = $request->input('to_station_code');
            $train_code = $request->input('train_code');


            if ($request->input('zuowei') == '无座') {
                unset($passengers[0]['zwcode']);
            }


            $passengers_json = json_encode($passengers, JSON_UNESCAPED_UNICODE);

            $client = new \GuzzleHttp\Client();
            $result = $client->post(config('juhe.trainTickets.ticketsSubmit'), [
                'query' => [
                    "key" => config('juhe.trainTickets.key'),
                    "user_orderid" => $user_order_id,
                    "train_date" => $train_date,
                    "from_station_code" => $from_station_code,
                    "to_station_code" => $to_station_code,
                    "checi" => $train_code,
                    "passengers" => $passengers_json,
                ]
            ]);

            $responseJosn = json_decode($result->getBody()->getContents());

            if (intval($responseJosn->error_code) === 0) {
                //写入乘车信息表
                $trains = new TrainsModel();
                $trains->uid = Auth::user()->id;
                $trains->train_date = $train_date;
                $trains->from_station_code = $from_station_code;
                $trains->from_station_name = $request->input('from_station_name');
                $trains->to_station_code = $to_station_code;
                $trains->to_station_name = $request->input('to_station_name');
                $trains->checi = $train_code;
                $trains->passengers = $passengers_json;
                $trains->user_orderid = $user_order_id;
                $trains->save();

                //写入乘车订单表
                $trains_id = $trains->id;

                $trainOrder = new TrainOrderModel();
                $trainOrder->trains_id = $trains_id;
                $trainOrder->return_order_id = $responseJosn->result->orderid;
                $trainOrder->user_orderid = $user_order_id;
                $trainOrder->payment_order_id = 0;
                $trainOrder->save();

                $trains_params = (array)$request->all();
                $trains_params['trains_info'] = $trains;
                $trains_params['train_order'] = $trainOrder;

                //写入session,供下级页面使用
                session([
                    'trains_params' => $trains_params
                ]);

                //清除验证码session
                session([$this->_codePrefix . $request->input('mobile') => '']);


                //跳转到下级页面
                return redirect('station/order/pay');
            } else {
                $err = $responseJosn->reason;
            }
        } else {
            $err = "验证码错误";
        }
        session(['error_tips' => $err]);
        return view('station.order', $request->all());

    }


    public function getZuoWeiCode($name)
    {
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


    public function getPassportTypeName($id)
    {

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

    /**
     * 验证手机号，然后登录
     * @param $mobile
     * @param $code
     */
    public function checkMobile($mobile, $code)
    {
        $user = UserModel::where("mobile", $mobile)->first();

        if (is_null($user)) {
            $user = new UserModel();
            $user->mobile = $mobile;
            $user->name = $mobile;
            $user->save();

            $user = UserModel::find($user->id);
        }

        Auth::login($user);
    }

    /**
     * 验证验证码
     * @param $mobile
     * @param $code
     * @return bool
     */
    public function checkCode($mobile, $code)
    {
//        dd($mobile,$code,session($mobile),$code);
        if (session($this->_codePrefix . $mobile)) {
            return $code == session($this->_codePrefix . $mobile);
        } else {
            return false;
        }
    }

    public function sendYZCode(Request $request)
    {

        $mobile = $request->input('mobile', '');

        //创建请求对象
        $client = new \GuzzleHttp\Client();

        $code = random_int(1000, 9999);
        //发送请求
        $result = $client->get(config('juhe.msgUrl'), [
            'query' => [
                'mobile' => $mobile,
                'tpl_id' => config('juhe.msgTemplate.yzcode'),
                'tpl_value' => urlencode("#code#=$code&#company#=爱旅纷途"),
                'key' => config('juhe.msgKey')
            ]
        ]);

//获取响应内容
        $json = json_decode($result->getBody()->getContents());

        if (intval($json->error_code) === 0) {
            session([$this->_codePrefix . $mobile => $code]);
        }
        return response()->json((array)$json);
    }

}
