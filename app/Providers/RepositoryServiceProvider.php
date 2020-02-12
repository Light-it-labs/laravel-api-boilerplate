<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\RepositoryInterface;
use App\Repository\ExampleRepositoryInterface;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\Eloquent\ExampleRepository;

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
