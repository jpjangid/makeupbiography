<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'name',
        'description',
        'short_description',
        'featured_image',
        'alt',
        'meta_title',
        'meta_description',
        'keywords',
        'tags',
        'og_title',
        'og_description',
        'og_image',
        'og_alt',
        'top_brand_status',
        'status',
        'flag',
    ];
}
