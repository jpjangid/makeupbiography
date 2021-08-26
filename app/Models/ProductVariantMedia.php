<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariantMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_variant_id','media','media_type','sequence','flag'
    ];
}
