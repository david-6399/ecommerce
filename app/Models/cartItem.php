<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'cartId',
        'productId',
        'quantity',
        'price'
    ];

    protected $table = 'cart_items' ; 

    protected $primary = ['cartId','productId'];

    public function product(){
        return $this->belongsTo(product::class, 'productId');
    }
}
