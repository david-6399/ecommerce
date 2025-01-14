<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'totalAmount',
        'paymentMethod',
        'status',
        'shippingAddress',
    ];

    public function users(){
        return $this->belongsTo(User::class , 'userId', 'id');
    }

    public function items(){
        return $this->belongsToMany(product::class, 'order_items', 'orderId', 'productId');
    }
}
