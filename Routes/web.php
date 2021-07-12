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
use Illuminate\Support\Facades\Route;
use Modules\ProductModule\Http\Controllers\ProductController;

/////////////        products   ////////////////////
 Route::resource('products', 'ProductController');
 Route::get('product/images/delete/{id}', 'ProductController@deleteProductImage')->name('product.images.delete');
 Route::get('get/products', 'ProductController@getProducts')->name('products.all');
 Route::get('user_products/{id}',function(){
    return view('productmodule::website.index');
});
/////////////        product status  /////////////////////
Route::prefix('productStatuses')->group(function() {
    Route::get('/delete/{id}','ProductStatusController@destroy');
});
   Route::resource('productStatuses', 'ProductStatusController');
