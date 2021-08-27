<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_name','coupan_code','select_scope','product_id','min_order_amount','max_order_amount',
        'type','user_id','start_datetime','end_datetime','week_days','coupan_limit','times_applied','discount_in_amount',
        'discount','status','flag'
    ];
}
