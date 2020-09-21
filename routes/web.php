<?php

    use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;


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

    Route::get('/', [IndexController::class,'index'])->name('index');
    Route::get('home', [IndexController::class,'index'])->name('home');
    Route::get('dashboard', [AdminController::class,'index'])->name('dashboard')
    ->middleware('role:1');


    //routs users
    Route::get('users/restore','UserController@restore')->name('users.restore')
    ->middleware('role:1');
    Route::get('users/{id}/enable','UserController@enable')->name('users.enable')
    ->middleware('role:1;');
    Route::resource('users', 'UserController')->middleware('role:1;');
    //end routs users

    //routs categories
    Route::get('categories/restore','CategoryController@restore')->name('categories.restore')
    ->middleware('role:1;');
    Route::get('categories/{id}/enable','CategoryController@enable')->name('categories.enable')
    ->middleware('role:1;');
    Route::resource('categories', 'CategoryController')->middleware('role:1;');
    //end categories

    //sub categories
    Route::get('sub-categories/restore','SubCategoryController@restore')
    ->name('sub-categories.restore')->middleware('role:1;');
    Route::get('sub-categories/{id}/enable','SubCategoryController@enable')
    ->name('sub-categories.enable')->middleware('role:1;');
    Route::resource('sub-categories', 'SubCategoryController')
    ->middleware('role:1;');
    // end sub-categories

    // product
    Route::get('product/restore','ProductController@restore')->name('product.restore')
    ->middleware('role:1;');
    Route::get('product/{id}/enable','ProductController@enable')->name('product.enable')
    ->middleware('role:1;');
    Route::resource('product', 'ProductController')
    ->middleware('role:1;');
    //end product


    // offer
    Route::get('offer/restore','OfferController@restore')->name('offer.restore')
    ->middleware('role:1;');
    Route::get('offer/{id}/enable','OfferController@enable')->name('offer.enable')
    ->middleware('role:1;');
    Route::resource('offer', 'OfferController')->middleware('role:1;');
    Route::GET('invoice/index', 'InvoiceController@index')->name('invoice.index')
    ->middleware('role:1;');
    Route::GET('invoice/{id}/show', 'InvoiceController@show')->name('invoice.show')
    ->middleware('role:1;');
    
    //end offer
    Auth::routes();
    
    //client->

    Route::GET('search','IndexController@search')->name('search');
    Route::GET('view/{id}/categry','IndexController@viewAllCategoriesd')->name('view.categry');
    Route::get('edit/perfil','HomeController@edit')->name('edit.perfil');
    Route::PUT('update/perfil','HomeController@update')->name('update.perfil');
    Route::PUT('update/{id}/seller-perfil','SellerController@update')->name('update.sellerperfil');



    Route::GET('show/{id}/productHome','ClientController@showProduct')->name('show.productHome');
    Route::GET('show/{id}/offerHome','ClientController@showOffer')->name('show.offerHome');

    Route::GET('carrito/{id}/add','CartController@add')->name('cart.add');
    Route::GET('carrito/{id}/addOffer','CartController@addOffer')->name('cart.addOffer');
    Route::GET('remove/{id}/element','CartController@remove')->name('remove.cartProduct');
    Route::GET('remove-all/element','CartController@clean')->name('removeAll.cartProduct');
    Route::GET('procesar/cart','CartController@shopping')->name('procesar.cart');
    Route::POST('new/{id}/comment','ClientController@newComment')->name('new.comment');
    Route::POST('ratings/{id}/like','ClientController@ratings')->name('ratings.like');

    //<-client
    

    // seller->
    Route::GET('index/seller','SellerController@index')->name('index.seller')
     ->middleware('role:2;');

    Route::GET('show/seller','SellerController@answer')->name('show.seller')
     ->middleware('role:2;');

    Route::POST('new/answer','SellerController@respans')->name('new.answer')
     ->middleware('role:2;');

     Route::GET('invoice/{invoiceId}','CartController@invoice')->name('invoice');

     Route::GET('edit/perfil','SellerController@edit')->name('edit.perfil')
     ->middleware('role:2;');
    // <- seller


    Route::get('paypal/pay', 'PaymentController@payWithPayPal')->name('paypal.pay');
    Route::get('paypal/status', 'PaymentController@payPalStatus');