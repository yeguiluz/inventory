<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_id')->unsigned();
            $table->foreign('shop_id')
                  ->references('id')->on('shop')
                  ->onDelete('cascade');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')
                  ->references('id')->on('products')
                  ->onDelete('cascade');
            $table->double('quantity');
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
        Schema::dropIfExists('shop_detail',function(Blueprint $table){
          $table->dropForeign('shop_id');
          $table->dropForeign('product_id');
        });
    }
}
