<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::if(
            'user',
            fn () => session('auth') ? true : false
        );
        Blade::if(
            'notUser',
            fn () => !session('auth')
        );
        Paginator::useBootstrapFive();
    }
}
