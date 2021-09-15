<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Category;
use Cart;

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
        Schema::defaultStringLength(191);
        // View::share('categories',Category::all());
        View::composer('*', function ($view) {
            $view->with('categories',Category::all());
            $view->with('Cart_contents',Cart::getContent());
            $view->with('Cart_subtotal',Cart::getSubTotal());
            $view->with('Cart_TotalQuantity',Cart::getTotalQuantity());
        });
    }
}
