<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','name','email','mobile','address','pincode','landmark','state','city','flag'
    ];

    public function location()
    {
        return $this->hasOne('App\Models\Location','zip','pincode');
    }
}
