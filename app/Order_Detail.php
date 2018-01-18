<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class Order_Detail extends Model
{
  protected $table='order_detail';
  protected $fillable=['order_id','product_id','quantity','price'];

  function order()
  {
    return $this->belongsTo(Order::class);
  }
  function product()
  {
    return $this->belongsTo(Product::class);
  }
}
