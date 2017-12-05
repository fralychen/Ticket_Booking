<?php

namespace App\Http\Controllers\User\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    public function index(){

//        dd(config('juhe.trainTickets.key'));
        return  view("user.index.index");
    }
}
