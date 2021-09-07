<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','product_variant_id','quantity', 'user_id'
    ];

    public function productVariant() {
        return $this->belongsTo('App\Models\ProductVariant','product_variant_id');
    }
    public function product() {
        return $this->belongsTo('App\Models\Product','product_id');
    }

}
