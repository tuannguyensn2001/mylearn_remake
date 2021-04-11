<?php

namespace App\Providers;

use App\Defines\Level;
use App\Defines\Status;
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
       View::share('_status',Status::getLists());
       View::share('_levels',Level::getLists());
    }
}
