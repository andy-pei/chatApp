<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contracts\PostServiceRepositoryInterface',
            'App\Repositories\PostServiceRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\PostTypeServiceRepositoryInterface',
            'App\Repositories\PostTypeServiceRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Contracts\CommentRepositoryInterface',
            'App\Repositories\CommentRepository'
        );
    }
}
