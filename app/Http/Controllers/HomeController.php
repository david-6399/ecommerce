<?php

namespace App\Http\Controllers;

use App\Models\cartItem;
use App\Models\category;
use App\Models\myCart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = category::get();
        return view('users.main ',[
            'categories' => $category
        ]);
    }

    public function showCategory($id){
        $category = category::find($id);
        return 'this is category page '. $category->name;
    }

    public function mycart(){
        $user = auth()->user();
        $product = $user->cart->items;


        return view('users.cart',[
            'products' => $product
        ]);
    }

    public function addProductToMyCart($id){
        dd('test');         
        $user = auth()->user()->id ;
        $product = product::find($id)->id;
        myCart::create([
            'userId' => $user,
            'productId' => $product
        ]);

    }

    public function products(){
        $product = product::paginate(8);
        return view('users.products',[
            'products' => $product
        ]);
    }

}
