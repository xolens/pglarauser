<?php

namespace Xolens\PgLarauser;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Xolens\PgLarautil\PgLarautilServiceProvider;

class PgLarauserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->register(PgLarautilServiceProvider::class);

        $this->publishes([
            __DIR__.'/../../config/xolens-pglarauser.php' => config_path('xolens-pglarauser.php'),
        ]);
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/xolens-pglarauser.php', 'xolens-pglarauser'
        );
    }
}