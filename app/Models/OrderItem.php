<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_id', 'quantity', 'item_status', 'flag'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }

    public function return()
    {
        return $this->belongsTo('App\Models\OrderItemReturn','id','order_item_id');
    }
}
