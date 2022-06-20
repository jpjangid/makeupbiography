<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscountDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'discount_id',
        'product_id',
        'discount_type',
        'discount',
    ];
}
