<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id','link_identifier','name','slug','brand_name','hsn','gst','short_description','description',
        'main_image','alt','meta_title','meta_keyword','meta_description','og_title','og_description','og_image',
        'tags','label_name','status','flag','brand_id'
    ];

    public function variants()
    {
        return $this->hasMany('App\Models\ProductVariant', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id');
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }
}
