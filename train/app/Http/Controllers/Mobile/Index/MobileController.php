<?php

namespace App\Http\Controllers\Mobile\Index;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobileController extends Controller
{
   public function index(Request $request){

       $formCity= $request->input('formCity');
       $toCity = $request->input('toCity');


       return view('mobile.index.index',['formCity'=>$formCity,'toCity'=>$toCity]);

   }
}
