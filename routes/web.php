<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Livewire\Lcategory;
use App\Livewire\Ldiscount;
use App\Livewire\Lpost;
use App\Livewire\Lproduct;
use App\Livewire\Luser;
use App\Livewire\Lvariation;
use App\Livewire\User\AddToCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// route::get('/' , Controller::class , 'index');
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::get('/category/{id}', [HomeController::class, 'showCategory'])->name('showCategory');
route::get('/mycart', [HomeController::class, 'mycart'])->name('mycart')->middleware('auth');
route::get('/products', [HomeController::class , 'products'])->name('showAllProducts');

// route::get('/home' , function(){ 
//     return view('welcome');
// })->middleware('auth');


route::middleware('can:admin','auth')->prefix('admin')->group(function(){
    route::view('','welcome');
    route::get('users', Luser::class);
    route::get('products', Lproduct::class)->can('admin');
    route::get('categories' , Lcategory::class)->name('categoryRouteName');
    route::get('variations',Lvariation::class);
    route::get('discounts',Ldiscount::class);
});


route::get('/send',[App\Http\Controllers\formContoller::class , 'fillForm']);

