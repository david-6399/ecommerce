<?php

namespace App\Livewire\User;

use App\Models\cartItem;
use Livewire\Component;

class MyCart extends Component
{
    public $products ;
    public $quantity ;
    public $totalAmount = 0 ;

    public function mount($products){
        $this->products = $products ;
        
        foreach($products as $product){
            $this->quantity[$product->id] = $product->pivot->quantity;
            $this->totalAmount += $product->pivot->quantity * $product->pivot->price;
        }
    }

    public function updated(){
        $this->products = auth()->user()->cart->items()->withPivot('quantity','price')->get();
        
        $this->totalAmount = 0 ;
        foreach ($this->products as $product) {
            $this->totalAmount +=  $product->pivot->price * $this->quantity[$product->id] ;
        }
    }

    public function updateChange($productId, $quantity){
        $this->quantity[$productId] = $quantity ;
    }

    public function saveQuantity(){
        foreach($this->quantity as $key=>$value){
            cartItem::where('productId',$key)->where('cartId',auth()->user()->cart->id)->update([
                'quantity' => $value    
            ]);
        }
    }

    public function removeProductFromCart($productId)
    {
        $cartId = auth()->user()->cart->id;
        cartItem::where('productId', $productId)->where('cartId', $cartId)->delete();

        $this->products = $this->products->filter(function($product) use ($productId) {
            return $product->id != $productId;
        });

        unset($this->quantity[$productId]);

        $this->updated();
    }

    public function checkOut(){
        dd($this->totalAmount);
    }

    public function render()
    { 
        return view('livewire.user.my-cart')->with([
            'products' => $this->products,
        ]);
    }

   

    
}
