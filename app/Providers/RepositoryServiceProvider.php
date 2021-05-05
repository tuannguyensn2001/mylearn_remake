<?php

namespace App\Providers;

use App\Repositories\Course\CourseRepository;
use App\Repositories\Course\CourseRepositoryEloquent;
use App\Repositories\Profile\ProfileRepository;
use App\Repositories\Profile\ProfileRepositoryEloquent;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CourseRepository::class,CourseRepositoryEloquent::class);
        $this->app->bind(ProfileRepository::class,ProfileRepositoryEloquent::class);
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
