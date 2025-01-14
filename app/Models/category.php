<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $tabel = 'categories' ;

    public function product(){
        return $this->hasMany(product::class , 'categoryId','id');
    }

    public function hasProduct($category){
        return $this->product()->where('name',$category);
    }

}
