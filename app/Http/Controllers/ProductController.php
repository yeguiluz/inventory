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
        //return json_encode(['prd' => $products]);
        return view('orders.products')
            ->with([
                'products' => $products
            ]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
      $product = new Product($request->all());
      $product->save();
      return redirect()->route('productsIndex');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
