<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'userID',
        'productID',
        'quantity',
        'total_amount',
        'mode_of_payment',
        'proof_of_payment',
        'order_status'
    ];
}