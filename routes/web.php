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

    Route::get('available',
    function () {
    })->name('productsAvailable')
      ->uses('ProductController@available');

    Route::post('store', function () {
    })->name('productsStore')
      ->uses('ProductController@store')
      ->middleware('auth');

});
Route::prefix('shop')->group(function () {
    Route::get('/',function () {
    })->name('productsIndex')
      ->uses('ProductController@available')
      ->middleware('auth');
      
    Route::post('add',function () {
      })->name('addCart')
        ->uses('ShopController@add');
});
