<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'product_id', 'product_variant_id', 'quantity', 'item_status'
    ];

    public function variant()
    {
        return $this->belongsTo('App\Models\ProductVariant', 'product_variant_id');
    }
}
