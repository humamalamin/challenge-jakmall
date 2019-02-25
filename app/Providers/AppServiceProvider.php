<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('phone_number', function($attribute, $value, $parameters)
        {
            return substr($value, 0, 3) == '081';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
