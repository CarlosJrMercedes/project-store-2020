<?php

namespace App\Providers;

use App\models\Category;
use App\models\Offer;
use App\models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {         
        View::composer('layouts.main',function($view){
            $cantidad= \Cart::getContent()->count();
            $view->with('carritoCount', $cantidad);
        });
        View::composer('layouts.main',function($view){
            $view->with('categoriesHome', Category::get(['id','name']));
        });
        View::composer('home',function($view){
            $view->with('offertsHome', Offer::with('product')->paginate(6));
        });
        View::composer('home',function($view){
            $view->with('productsHome', Product::with('subCategory')->paginate(10));
        });
    }
}
