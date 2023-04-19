<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        //  Set global value for App Name

         view() -> composer('*', function($view){
            $view->with('APP_NAME', env('APP_NAME')) ;
        });

        //  Set global value for App Name

         view() -> composer('*', function($view){
            $view->with('APP_EMAIL', env('MAIL_FROM_ADDRESS')) ;
        });
    }
}