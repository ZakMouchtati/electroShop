<?php

namespace App\Providers;

use App\View\Composers\CategoryCompose;
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
        View::composer('app.layouts', CategoryCompose::class);
        View::composer('checkout.create', CategoryCompose::class);
        View::composer('checkout.index', CategoryCompose::class);
    }
}
