<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersProduct', function (Blueprint $table) {
            $table->id('orderpro_id');
            $table->unsignedBigInteger('order_id')
                ->constrained('orders');
            $table->unsignedBigInteger('pro_id')
                ->constrained('products');
            $table->bigInteger('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
