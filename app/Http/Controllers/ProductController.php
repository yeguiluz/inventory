<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{

    public function list()
    {
        $products = Product::all();
        return json_encode(['prd' => $products]);
    }

    public function available()
    {
        $products = DB::table('products')->where('stock', '>', 0)->get();
        return view('orders.products')
            ->with([
                'products' => $products
            ]);
    }
    public function productsAvailable()
    {
        $products = DB::table('products')->where('stock', '>', 0)->get();
        return json_encode(['prd'=> $products]);
    }

    public function store(Request $request)
    {
      $product = new Product($request->all());
      $product->save();
      return redirect()->route('productsIndex');
    }

}
