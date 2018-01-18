<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Shop_Detail;

class Order extends Model
{
    protected $fillable=['user_id','status','total','address_order','address_invoice'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
      return $this->hasMany(Order_Detail::class);
    }

}
