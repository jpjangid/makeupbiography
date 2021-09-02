<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponUsedBy extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_id','user_id','applied_times'
    ];
}
