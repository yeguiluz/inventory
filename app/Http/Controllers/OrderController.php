<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\Order_Detail;
use App\Product;
use App\Shop;
use App\Shop_Detail;
use Redirect;

class OrderController extends Controller
{
    public function create(Request $request)
    {
      //Insertar Orden
      $order = new Order();
      $order->user_id = \Auth::user()->id;
      $order->status = "created";
      $order->total = $request->total;
      $order->address_order = $request->address1;
      $order->address_invoice = $request->address2;
      $order->save();

      //Obtener Shop_Detail
      $detail = Shop_Detail::where('shop_id',$request->shop_id)->get();

      //Insertar Order Detail
      foreach ($detail as $det) {
        $orderDetail = new Order_Detail();
        $orderDetail->order_id = $order->id;
        $orderDetail->product_id= $det->product_id;
        $orderDetail->quantity= $det->quantity;
        $orderDetail->save();
      }
      //Eliminar Carrito
      Shop::destroy($request->shop_id);

      return redirect()->route('shop');
    }

    public function View($id)
    {
      $userType = \Auth::user()->type;
      $order = Order::find($id);
      if ($userType== 'vendor'){
        if (\Auth::user() != $order->user->type){
          $order = [];
          return view('orders.view')->with('order',$order);
        }
      }
      return view('orders.view')->with('order',$order);
    }

    public function MyOrders()
    {
      $orders = Order::where('user_id',\Auth::user()->id)->get();
      return json_encode(['ord'=> $orders]);
    }

    public function list()
    {
      $orders = DB::table('orders')
      ->join('users', 'user_id', '=', 'users.id')
      ->select('orders.*', 'users.name')
      ->get();
      return json_encode(['ord' => $orders]);
    }
}
