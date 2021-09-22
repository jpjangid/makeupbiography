<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedProducts extends Model
{
    use HasFactory;

    protected $fillable = [
        'main_id','related_id','sequence','flag'
    ];
    
    public function main()
    {
        return $this->belongsTo('App\Models\Product', 'main_id');
    }
    
    public function related()
    {
        return $this->belongsTo('App\Models\Product', 'related_id');
    }
}
