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
use \Modules\ProductModule\Http\Controllers\ProductController;

/**
 * Dashboard Routes
*/
Route::prefix('admin')->middleware(['auth'])->group(function () {
    /* Products */
    Route::resource('products', 'ProductController');

    /* Products Status */
    Route::resource('productStatuses', 'ProductStatusController');
    Route::prefix('productStatuses')->group(function() {
        Route::get('/delete/{id}','ProductStatusController@destroy');
    });

});

/**
 * Website Routes
 */
Route::middleware(['auth'])->group(function () {

    Route::prefix('product')->group(function(){
        Route::get('/{product}', [ProductController::class,'getProductDetails'])->name('show.product');
    });
    // Route::prefix('products')->group(function(){

    //
    //     // Route::middleware(['auth'])->group(function () {
    //     //     // Route::get('/user/{name}',[ProductController::class , 'getUserProducts'])->name('user.products');
    //     //     // Route::get('/delete/{id}',[ProductController::class , 'destroy'])->name('product.delete');
    //     //     // Route::get('/image/delete/{id}',[ProductController::class , 'deleteProductImage'])->name('product.image.delete');
    //     // });

    // });
});
