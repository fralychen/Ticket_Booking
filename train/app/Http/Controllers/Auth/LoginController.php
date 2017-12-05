<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserModel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    //

    public function login(Request $request){


        //
        $mobile = $request->input('mobile');
        $code = $request->input('code');

        //获取发送的验证码
        $codeKey = "m_".$mobile;

        $scode = session($codeKey);


        if ((int)$scode !== (int)$code){
            return ('验证码不正确');
        }

        //验证手机号存不存在

        $rs = UserModel::where("mobile",$mobile)->first();

        if (is_null($rs)){

            return "用户不存在";

        }else{

            Auth::login($rs);

            return redirect('/');

        }

    }
}
