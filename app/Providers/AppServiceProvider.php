<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
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
        $this->menuLoad();
        view()->share('connect', mysqli_connect("localhost", "root","", "films"));

    }

    public function menuLoad(){
        View::composer('layouts.app', function ($view){
           $view->with('categories', Category::with('children')->where('parent_id', 0)->get());
        });

    }
}
