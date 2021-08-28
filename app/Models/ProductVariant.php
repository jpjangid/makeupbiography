<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','link_identifier','name','sku','discount_type','discount','regular_price','sale_price','flag',
        'variation','hex_code','p_type','sequence','slug'
    ];
}
