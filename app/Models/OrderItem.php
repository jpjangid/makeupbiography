<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_id', 'product_variant_id', 'quantity', 'item_status', 'flag'
    ];

    public function variant()
    {
        return $this->belongsTo('App\Models\ProductVariant', 'product_variant_id');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
}
