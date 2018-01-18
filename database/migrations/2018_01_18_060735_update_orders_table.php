<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('orders', function (Blueprint $table) {
          $table->text('address_order');
          $table->text('address_invoice')->nullable();
      });
    }

    public function down()
    {
      Schema::table('orders', function (Blueprint $table) {
        $table->dropColumn('address_order');
        $table->dropColumn('address_invoice');
      });
    }

}
