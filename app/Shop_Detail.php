<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop;
use App\Product;

class Shop_Detail extends Model
{
  protected $table = 'shop_detail';
  protected $fillable= ['shop_id','product_id','quantity'];

  function shop()
  {
    return $this->belongsTo(Shop::class);
  }
  function products()
  {
    return $this->belongsTo(Product::class);
  }

}
