<?php

namespace App\Providers;
use App\Setting;
use App\Category;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //when header run every time we can use these data coming from db without go to every controller
        view()->composer('front.inc.header',function($view){
            $view->with('cats',Category::select('id','name')->get());
            $view->with('sett',Setting::select('logo','favicon')->first());
        });
        view()->composer('front.inc.footer',function($view){
          $view->with('sett',Setting::select('logo','favicon','city','address','phone','email','fb','twitter','insta')->first());
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
