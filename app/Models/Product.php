<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id','name','slug','brand_name','hsn','gst','short_description','description','main_image','alt',
        'meta_title','meta_keyword','meta_description','og_title','og_description','og_image','tags','status','flag'
    ];
}
