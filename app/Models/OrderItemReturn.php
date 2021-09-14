<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItemReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','order_id','order_item_id','product_id','product_variant_id','quantity','amount','reason',
        'description','status','return_no','shiprocket_order_id', 'shiprocket_shipment_id'
    ];

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }

    public function item()
    {
        return $this->belongsTo('App\Models\OrderItem','order_item_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function variant()
    {
        return $this->belongsTo('App\Models\ProductVariant', 'product_variant_id');
    }
}
