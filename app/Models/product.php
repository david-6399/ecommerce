<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'description',
        'imagePath',
        'unitPrice',
        'Quantity',
        'categoryId'
    ];

    public function variations(){
        return $this->hasMany(variation::class , 'productId','id');
    }

    public function category(){
        return $this->belongsTo(category::class ,'categoryId','id');
    }

    public function items(){
        return $this->belongsToMany(myCart::class , 'cart_items', 'productId', 'cartId')->withPivot('quantity','price');
    }

    public function orders(){
        return $this->belongsToMany(order::class, 'order_items', 'productId', 'orderId');
    }

    
}
