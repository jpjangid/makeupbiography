<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    use HasFactory;
    protected $fillable = [
        'discount_on',
        'entity_id',
        'discount_type',
        'discount',
        'brand_exclusion',
        'products_exclusion',
        'start_date',
        'end_date',
    ];
}
