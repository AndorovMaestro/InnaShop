<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text("address");
            $table->string("phone_number");
            $table->foreignIdFor(\App\Models\User::class)->nullable(true);
            $table->index("user_id");
            $table->foreign("user_id")->references("id")->on("users")->onDelete(null);
            $table->timestamps();
        });

        Schema::create('order_product', function (Blueprint $table) {

            $table->foreignIdFor(\App\Models\Product::class)->nullable(true);
            $table->index("product_id");
            $table->foreign("product_id")->references("id")->on("products")->onDelete(null);

            $table->foreignIdFor(\App\Models\Order::class)->nullable(true);
            $table->index("order_id");
            $table->foreign("order_id")->references("id")->on("orders")->onDelete(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_product');
        Schema::dropIfExists('orders');
    }
};
