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

        $product = Product::find($det->product_id);
        $product->stock = $product->stock - $det->quantity;
        $product->save();
      }
      //Eliminar Carrito
      Shop::destroy($request->shop_id);

      return redirect()->route('orderView',['id'=>$order->id]);
    }

    public function View($id)
    {
      $userType = \Auth::user()->type;
      $order = Order::find($id);
      if ($userType== 'client'){
        if (\Auth::user()->id != $order->user->id){
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
      $userType = \Auth::user()->type;
      if ($userType== 'client')
      {
        return null;
      }
      $orders = DB::table('orders')
      ->join('users', 'user_id', '=', 'users.id')
      ->select('orders.*', 'users.name')
      ->get();
      return json_encode(['ord' => $orders]);
    }
    public function accepted($id){
      $order = Order::find($id);
      $order->status = 'accepted';
      $order->save();
      return Redirect::back();
    }
    public function rejected($id){
      $order = Order::find($id);
      $order->status = 'rejected';
      $order->save();
      $detail = Order_Detail::where('order_id',$id)->get();
      foreach ($detail as $det) {
        $product = Product::find($det->product_id);
        $product->stock = $product->stock + $det->quantity;
        $product->save();
      }
      return Redirect::back();
    }
    public function sended($id){
      $order = Order::find($id);
      $order->status = 'sended';
      $order->save();
      return Redirect::back();
    }
    public function received($id){
      $order = Order::find($id);
      $order->status = 'received';
      $order->save();
      return Redirect::back();
    }
}
