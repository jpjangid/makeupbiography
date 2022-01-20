<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id','link_identifier','item_name','slug','brand_name','sequence','ecom',
        'description','main_image','alt','meta_title','meta_keyword','meta_description','og_title',
        'og_description','og_image','tags','label_name','status','flag','brand_id','item_shade_name',
        'main_cat_name','cat_name','sub_cat_name','hsn','gst','short_description','sku','hex_code','p_type',
        'variation','discount_type','discount','regular_price','sale_price','lastmodifycode',
    ];

    public function medias()
    {
        return $this->hasMany('App\Models\ProductMedia', 'product_id');
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
