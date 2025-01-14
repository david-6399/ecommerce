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
        Schema::create('order_items', function (Blueprint $table) {
            $table->foreignId('orderId');
            $table->foreignId('productId');
            $table->primary(['orderId', 'productId']);
            $table->integer('totalAmount');
            $table->integer('quantity')->default(1);
            $table->timestamps();

            $table->foreign('orderId')->references('id')->on('orders');
            $table->foreign('productId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
