<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', 'media', 'media_type', 'sequence', 'flag', 'media_alt'
    ];

    public function products()
    {
        return $this->belongsTo('App\Models\Product', 'id');
    }
}
