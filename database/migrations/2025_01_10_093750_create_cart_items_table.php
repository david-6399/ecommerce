<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->foreignId('cartId');
            $table->foreignId('productId');
            $table->primary(['cartId','productId']);
            $table->integer('quantity');
            $table->integer('price');
            $table->timestamps();
            
            $table->foreign('cartId')->references('id')->on('my_carts');
            $table->foreign('productId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
