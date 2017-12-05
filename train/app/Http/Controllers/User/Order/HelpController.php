<?php

namespace App\Http\Controllers\User\Order;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HelpController extends Controller
{
    public function index(){
        return view('user.order.help');
    }
}
