<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema; //bug in laravel bij migration oplossen door schema
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
        //
        Schema::defaultStringLength(191); //bug in laravel bij migration oplossen door schema
    }
}
