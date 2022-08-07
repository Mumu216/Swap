<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/





// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/' , 'App\Http\Controllers\Frontend\PagesController@homepage')->name('homepage');
Route::get('/wishlist' , 'App\Http\Controllers\Frontend\PagesController@wishlist')->name('wishlist');
Route::get('/all-products' , 'App\Http\Controllers\Frontend\PagesController@allProducts')->name('allProducts');
Route::get('/product-details/{slug}' , 'App\Http\Controllers\Frontend\PagesController@productDetails')->name('productDetails');
Route::get('/category/{slug}' , 'App\Http\Controllers\Frontend\PagesController@category')->name('category.show');
Route::get('/pcategory/{id}' , 'App\Http\Controllers\Frontend\PagesController@pcategory')->name('pcategory.show');

Route::get('/search' , 'App\Http\Controllers\Frontend\PagesController@search')->name('search');

Route::group(['prefix' => 'cart'] , function(){
    Route::get('/' , 'App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
    Route::post('/store' , 'App\Http\Controllers\Frontend\CartController@store')->name('cart.store');
    Route::post('/update/{id}' , 'App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
    Route::post('/delete/{id}' , 'App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');
});

Route::get('/checkout' , 'App\Http\Controllers\Frontend\PagesController@checkout')->name('checkout');
Route::get('/customer-login' , 'App\Http\Controllers\Frontend\PagesController@login')->name('customer-login');


Route::group(['prefix' => 'user'] , function(){
// User Profile
Route::get('/my-profile', 'App\Http\Controllers\Frontend\UserController@index')->name('user-profile')->middleware('auth' ,'verified');
Route::get('/profile-update/{id}', 'App\Http\Controllers\Frontend\UserController@create')->middleware('auth')->name('profile.update');
Route::post('/profile-update/{id}', 'App\Http\Controllers\Frontend\UserController@store')->middleware('auth')->name('profile.store');

// order management
Route::get('/order-history' , 'App\Http\Controllers\Frontend\OrderManagementController@index')->name('order-history');

});


// SSLCOMMERZ Start

Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);


Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('make_payment');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success'])->name('payment_success');
Route::post('/fail', [SslCommerzPaymentController::class, 'fail'])->name('payment_failed');
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel'])->name('payment_cancel');

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


// Admin Group
Route::middleware('auth','role' ,'verified')->group(function () {
   Route:: group(['prefix' => 'admin'] , function(){
      // Admin Dashboard page
     Route::get('/dashboard','App\Http\Controllers\Backend\PagesController@dashboard')->name('admin.dashboard')->middleware('auth');


     //brand Group

     Route::group(['prefix' => '/brand'], function(){

     Route::get('/manage','App\Http\Controllers\Backend\BrandController@index')->name('brand.manage')->middleware('auth');
     Route::get('/create','App\Http\Controllers\Backend\BrandController@create')->name('brand.create')->middleware('auth');
     Route::post('/store','App\Http\Controllers\Backend\BrandController@store')->name('brand.store')->middleware('auth');
     Route::get('/edit/{id}','App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit')->middleware('auth');
     Route::post('/update/{id}','App\Http\Controllers\Backend\BrandController@update')->name('brand.update')->middleware('auth');
     Route::post('/destroy/{id}','App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy')->middleware('auth');


   });
   // category Group

   Route::group(['prefix'  => '/category'] , function(){

      Route::get('/manage','App\Http\Controllers\Backend\CategoryController@index')->name('category.manage')->middleware('auth');
      Route::get('/create','App\Http\Controllers\Backend\CategoryController@create')->name('category.create')->middleware('auth');
      Route::post('/store','App\Http\Controllers\Backend\CategoryController@store')->name('category.store')->middleware('auth');
      Route::get('/edit/{id}','App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit')->middleware('auth');
      Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('category.update')->middleware('auth');
      Route::post('/destroy/{id}','App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy')->middleware('auth');
   });


    // product Group

    Route::group(['prefix'  => '/product'] , function(){

      Route::get('/manage','App\Http\Controllers\Backend\ProductController@index')->name('product.manage')->middleware('auth');
      Route::get('/create','App\Http\Controllers\Backend\ProductController@create')->name('product.create')->middleware('auth');
      Route::post('/store','App\Http\Controllers\Backend\ProductController@store')->name('product.store')->middleware('auth');
      Route::get('/edit/{id}','App\Http\Controllers\Backend\ProductController@edit')->name('product.edit')->middleware('auth');
      Route::post('/update/{id}','App\Http\Controllers\Backend\ProductController@update')->name('product.update')->middleware('auth');
      Route::post('/destroy/{id}','App\Http\Controllers\Backend\ProductController@destroy')->name('product.destroy')->middleware('auth');
   });



    // product Group

    Route::group(['prefix'  => '/division'] , function(){

      Route::get('/manage','App\Http\Controllers\Backend\DivisionController@index')->name('division.manage')->middleware('auth');
      Route::get('/create','App\Http\Controllers\Backend\DivisionController@create')->name('division.create')->middleware('auth');
      Route::post('/store','App\Http\Controllers\Backend\DivisionController@store')->name('division.store')->middleware('auth');
      Route::get('/edit/{id}','App\Http\Controllers\Backend\DivisionController@edit')->name('division.edit')->middleware('auth');
      Route::post('/update/{id}','App\Http\Controllers\Backend\DivisionController@update')->name('division.update')->middleware('auth');
      Route::post('/destroy/{id}','App\Http\Controllers\Backend\DivisionController@destroy')->name('division.destroy')->middleware('auth');
   });

   Route::group(['prefix'  => '/district'] , function(){

      Route::get('/manage','App\Http\Controllers\Backend\DistrictController@index')->name('district.manage')->middleware('auth');
      Route::get('/create','App\Http\Controllers\Backend\DistrictController@create')->name('district.create')->middleware('auth');
      Route::post('/store','App\Http\Controllers\Backend\DistrictController@store')->name('district.store')->middleware('auth');
      Route::get('/edit/{id}','App\Http\Controllers\Backend\DistrictController@edit')->name('district.edit')->middleware('auth');
      Route::post('/update/{id}','App\Http\Controllers\Backend\DistrictController@update')->name('district.update')->middleware('auth');
      Route::post('/destroy/{id}','App\Http\Controllers\Backend\DistrictController@destroy')->name('district.destroy')->middleware('auth');
   });

   Route::group(['prefix'  => '/order-management'] , function(){

    Route::get('/manage','App\Http\Controllers\Backend\OrderController@index')->middleware('auth')->name('order.manage');
    Route::get('/details/{id}','App\Http\Controllers\Backend\OrderController@show')->middleware('auth')->name('order.details');
    Route::get('/edit/{id}','App\Http\Controllers\Backend\OrderController@edit')->name('order.edit')->middleware('auth');
    Route::post('/update/{id}','App\Http\Controllers\Backend\OrderController@update')->name('order.update')->middleware('auth');
    Route::post('/destroy/{id}','App\Http\Controllers\Backend\OrderController@destroy')->name('order.destroy')->middleware('auth');
 });

  });
});


require __DIR__.'/auth.php';

