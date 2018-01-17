<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')
                  ->references('id')->on('orders');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
            $table->double('quantity')->default(0);
            $table->double('price')->default(0);
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
        Schema::dropIfExists('order_detail',function(Blueprint $table){
          $table->dropForeign('order_id');
          $table->dropForeign('product_id');
        });
    }
}
