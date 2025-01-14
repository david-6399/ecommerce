<?php

namespace App\Livewire\User;

use App\Models\cartItem;
use App\Models\myCart;
use App\Models\product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class AddToCart extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.userComponents.add-to-cart');
    }

    public function addToCart($id){
        if(!Auth::check()){
            return dd('you are not loged');
        }else{

            $user = auth()->user()->id ;
            $cart = myCart::where('userId', 'like', $user)->first();
            $product = product::find($id);

            if($cart === null ){
                myCart::create([
                    'userId' => $user
                ]);
            }

            if(cartItem::where('cartId', 'like', $cart->id)->where('productId', 'like', $product->id)->exists()){
                dd('show alert - already existe');
            }

            $validator = Validator::make([
                'cartId' => $cart->id,
                'productId' => $product->id ,
                'quantity' => 1 ,
                'price' => $product->unitPrice
            ],[
                'cartId' => 'required|exists:my_carts,id',
                'productId' => 'required|exists:products,id',
                'quantity' => 'required|numeric|min:1',
                'price' => 'required|numeric|min:0'
            ]);

            if($validator->fails()){
                return dd('show alert - validator are failed');
            }

            cartItem::create($validator->validated());
            
        }

    }
}
