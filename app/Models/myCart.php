<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myCart extends Model
{
    use HasFactory;

    protected  $table = 'my_carts';

    protected $fillable = [
        'userId',
    ];


    public function user(){
        return $this->belongsTo(User::class , 'userId','id');
    }



    public function items(){
        return $this->belongsToMany(product::class , 'cart_items',  'cartId', 'productId')->withPivot('quantity','price');
    }

    
}
