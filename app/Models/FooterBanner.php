<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterBanner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','url','alt','image','status','flag'
    ];

}
