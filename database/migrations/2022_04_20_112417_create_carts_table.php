<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Route;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignIdFor(\App\Models\User::class)->nullable(true)->unique();
            $table->index("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete(null);
        });
        Schema::create('cart_product', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Product::class)->nullable(true);
            $table->index("product_id");
            $table->foreign("product_id")->references("id")->on("products")->onDelete(null);

            $table->foreignIdFor(\App\Models\Cart::class)->nullable(true);
            $table->index("cart_id");
            $table->foreign("cart_id")->references("id")->on("carts")->onDelete(null);


        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_product');
        Schema::dropIfExists('carts');
    }
};
