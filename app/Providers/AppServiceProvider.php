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
        

        $data['categoriesHome'] = Category::get(['id','name']);
        $data['offertsHome'] = Offer::with('product')->paginate(10);
        $data['productsHome'] = Product::with('subCategory')->paginate(10);
        View::share($data);
    }
}
