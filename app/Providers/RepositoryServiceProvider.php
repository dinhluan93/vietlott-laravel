<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\Power655Repository;
use App\Repositories\Interfaces\Power655RepositoryInterface;
use App\Repositories\Eloquent\Power655GenerateRepository;
use App\Repositories\Interfaces\Power655GenerateRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            RepositoryInterface::class,
            BaseRepository::class
        );
        $this->app->singleton(
            Power655RepositoryInterface::class,
            Power655Repository::class
        );
        $this->app->singleton(
            Power655GenerateRepositoryInterface::class,
            Power655GenerateRepository::class
        );
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
