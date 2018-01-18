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
    function shopDetail()
    {
      return $this->hasMany(Shop_Detail::class);
    }
}
