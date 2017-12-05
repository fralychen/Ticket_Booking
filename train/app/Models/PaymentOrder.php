<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentOrder extends Model
{
    //
    protected $table = "payment_order";

    protected $primaryKey = "order_id";
}
