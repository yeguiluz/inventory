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
    })->name('productsIndex')->middleware('auth','vendor');

    Route::get('list',
    function () {
    })->name('productsList')
      ->uses('ProductController@list')->middleware('auth','vendor');

    Route::get('instock',
    function () {
    })->name('productsAvailable')
      ->uses('ProductController@productsAvailable')
      ->middleware('auth');

    Route::post('store', function () {
    })->name('productsStore')
      ->uses('ProductController@store')
      ->middleware('auth');

    Route::get('find/{id}', function () {
    })->name('productFind')
      ->uses('ProductController@find')
      ->middleware('auth');

    Route::post('edit', function () {
    })->name('productEdit')
      ->uses('ProductController@edit')
      ->middleware('auth');


});
Route::prefix('shop')->group(function () {
    Route::get('/',function () {
    })->name('shop')
      ->uses('ProductController@available')
      ->middleware('auth','client');

    Route::post('add',function () {
      })->name('addCart')
        ->uses('ShopController@add')
        ->middleware('auth');

    Route::get('remove/{id}',function () {
    })->name('removeItem')
      ->uses('ShopController@removeItem')
      ->middleware('auth');

    Route::get('cart',function () {
    })->name('cart')
      ->uses('ShopController@cart')
      ->middleware('auth','client');
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
      ->middleware('auth','vendor');
    Route::get('own',function () {
      return view('orders.myorders');
    })->name('ownOrders')
      ->middleware('auth');
    Route::get('all',function () {
      return view('orders.list');
    })->name('ordersAll')
      ->middleware('auth','vendor');

    Route::get('accepted/{id}',function () {
    })->name('orderAccepted')
      ->uses('OrderController@accepted')
      ->middleware('auth','vendor');
    Route::get('rejected/{id}',function () {
    })->name('orderRejected')
      ->uses('OrderController@rejected')
      ->middleware('auth','vendor');
    Route::get('sended/{id}',function () {
    })->name('orderSended')
      ->uses('OrderController@sended')
      ->middleware('auth','vendor');
    Route::get('received/{id}',function () {
    })->name('orderReceived')
      ->uses('OrderController@received')
      ->middleware('auth','client');

});

Route::prefix('users')->group(function(){
  Route::get('/',function(){
    return view('users.users');
  })->name('users')
    ->middleware('auth','admin');
  Route::get('list',function(){
  })->name('userList')
    ->uses('UsersController@list')
    ->middleware('auth','admin');
  Route::post('store',function(){
  })->name('userStore')
    ->uses('UsersController@store')
    ->middleware('auth','admin');
});
