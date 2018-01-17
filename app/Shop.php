<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Shop_Detail;

class Shop extends Model
{
  protected $table = 'shop';
  protected $fillable=['user_id'];

  public function users()
  {
    return $this->belongsTo(User::class);
  }

  public function shop_detail()
  {
    return $this->hasMany(Shop_Detail::class);
  }
    //
}
