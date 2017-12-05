<?php

namespace App\Http\Controllers\Mobile\Station;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DptcodeController extends Controller
{
    public function index(){
        return view('mobile.station.form');
    }
}
