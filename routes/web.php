<?php

    use App\Http\Controllers\AdminController;
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

    Route::get('/', [IndexController::class,'index'])->name('home');
    Route::get('home', [AdminController::class,'index'])->name('home');


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
    Route::resource('offer', 'OfferController')
    ->middleware('role:1;');
    //end offer
    Auth::routes();

    // Route::get('/home', 'HomeController@index')->name('home');
