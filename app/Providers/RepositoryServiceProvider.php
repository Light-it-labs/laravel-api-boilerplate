<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\RepositoryInterface;
use App\Repositories\ExampleRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\ExampleRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
        $this->app->bind(ExampleRepositoryInterface::class, ExampleRepository::class);
    }
}
