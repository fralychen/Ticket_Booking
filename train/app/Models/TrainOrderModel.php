<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainOrderModel extends Model
{
    //
    protected  $table = 'train_order';


    public function payOrder()
    {
        $this->hasOne(PaymentOrder::class,'order_id','payment_order_id');
    }
}
