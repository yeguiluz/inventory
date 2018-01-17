<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Shop_Detail;
class Product extends Model
{
    //
    protected $fillable = [
      'name',
      'stock',
      'stock_alt',
      'price'
    ];
    function shop_detail()
    {
      return $this->hasOne(Shop_Detail::class);
    }
}
