<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('products')->group(function () {
    Route::get('index',
    function () {
      return view('products.index');
    })->name('productsIndex');

    Route::get('list',
    function () {
    })->name('productsList')
    ->uses('ProductController@list');

    Route::post('store', function () {
    })->name('productsStore')
    ->uses('ProductController@store');
    // Route::get('delete', function () {
    //     // Matches The "/admin/users" URL
    // });
});

//Route::get('/products/create', 'ProductController@store')->name('productsCreate');
