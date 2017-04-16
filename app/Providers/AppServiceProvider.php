<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.sidebar', function ($view){
          $view->with('archives', \App\Post::archives());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
      // \App::singleton(Stripe::class, function() {
      $this->app->singleton(Stripe::class, function() {
        return new Stripe(config('services.stripe.secret'));
      });

      //The following  three lines do the same thing.
      //$stripe = App::make('App\Billing\Stripe');
      //$stripe = app('App\Billing\Stripe');
      //$stripe = resolve('App\Billing\Stripe');
    }
}
