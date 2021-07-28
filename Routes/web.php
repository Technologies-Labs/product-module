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


//  products  //

 Route::resource('products', 'ProductController');
 Route::prefix('products')->group(function(){

    Route::get('/user_products/{id}','ProductController@getUserProducts')->name('user.products');
    Route::get('/delete/{id}','ProductController@destroy')->name('product.delete');
    Route::get('/image/delete/{id}','ProductController@deleteProductImage')->name('product.image.delete');

 });


/////////////        product status  /////////////////////
Route::prefix('productStatuses')->group(function() {
    Route::get('/delete/{id}','ProductStatusController@destroy');
});
   Route::resource('productStatuses', 'ProductStatusController');

/////////////    product status  /////////////////////
