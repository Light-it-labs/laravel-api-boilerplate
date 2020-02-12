<?php

namespace App\Providers;

use App\Repository\RepositoryInterface;
use BaseRepository;
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
        $this->app->bind(RepositoryInterface::class, BaseRepository::class);
//        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
