<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Shop;
use App\Shop_Detail;
use Redirect;


class ShopController extends Controller
{
    //
    function add(Request $request)
    {
      $user_id = \Auth::user()->id;
      $cart = Shop::where('user_id',$user_id)->first();
      if (!$cart){
        $cart = new Shop();
        $cart->user_id = $user_id;
        $cart->save();
      }
      $cart_id = $cart->id;
      $item = new Shop_Detail();
      $item->shop_id= $cart_id;
      $item->product_id= $request->product_id;
      $item->quantity=$request->quantity;
      $item->save();

      $result = array(
        'message' => 'Añadido al carro de compras',
        'alert-type' => 'success'
      );
      return Redirect::back()->with($result);

    }

    public function cart()
    {
      $user_id = \Auth::user()->id;
      $cart = Shop::where('user_id',$user_id)->first();
      return view('orders.cart')->with('cart', $cart);
    }

    public function removeItem($id)
    {
      Shop_Detail::destroy($id);
      return Redirect::back();
    }
}
