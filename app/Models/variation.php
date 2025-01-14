<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','value','productId'
    ];

    public function products(){
        return $this->belongsTo(product::class, 'productId','id');
    }
    
}
