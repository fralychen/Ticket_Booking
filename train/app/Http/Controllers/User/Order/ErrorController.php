<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/4/004
 * Time: 14:43
 */

namespace App\Http\Controllers\User\Order;




namespace App\Http\Controllers\User\Order;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

class ErrorController extends Controller
{

    public function index(){

        return view('errors.404');
    }
}



