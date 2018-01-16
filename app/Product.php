<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
      'name',
      'stock',
      'stock_alt',
      'price'
    ];
}
