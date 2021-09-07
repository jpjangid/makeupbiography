<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','name','sku','discount_type','discount','regular_price','sale_price','flag',
        'variation','hex_code','p_type','sequence','slug'
    ];

    public function medias()
    {
        return $this->hasMany('App\Models\ProductVariantMedia', 'product_variant_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id');
    }
}
