<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug','title','description','short_description','featured_image','meta_title','meta_description','keywords',
        'tags','publish_date','alt','status','flag','category'
    ];
}
