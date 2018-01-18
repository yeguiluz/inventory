<?php

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('products')->group(function () {
    Route::get('/',
    function () {
      return view('products.index');
    })->name('productsIndex')->middleware('auth');

    Route::get('list',
    function () {
    })->name('productsList')
      ->uses('ProductController@list')->middleware('auth');

    Route::get('instock',
    function () {
    })->name('productsAvailable')
      ->uses('ProductController@productsAvailable');

    Route::post('store', function () {
    })->name('productsStore')
      ->uses('ProductController@store')
      ->middleware('auth');

});
Route::prefix('shop')->group(function () {
    Route::get('/',function () {
    })->name('shop')
      ->uses('ProductController@available')
      ->middleware('auth');

    Route::post('add',function () {
      })->name('addCart')
        ->uses('ShopController@add');

    Route::get('remove/{id}',function () {
    })->name('removeItem')
      ->uses('ShopController@removeItem');

    Route::get('cart',function () {
    })->name('cart')
      ->uses('ShopController@cart');
});

Route::prefix('order')->group(function () {
    Route::post('create',function () {
    })->name('orderCreate')
      ->uses('OrderController@create')
      ->middleware('auth');
    Route::get('view/{id}',function () {
    })->name('orderView')
      ->uses('OrderController@view')
      ->middleware('auth');
    Route::get('myorders',function () {
    })->name('myOrders')
      ->uses('OrderController@MyOrders')
      ->middleware('auth');
    Route::get('list',function () {
    })->name('ordersList')
      ->uses('OrderController@list')
      ->middleware('auth');
    Route::get('own',function () {
      return view('orders.myorders');
    })->name('ownOrders')
      ->middleware('auth');
    Route::get('all',function () {
      return view('orders.list');
    })->name('ordersAll')
      ->middleware('auth');

});
