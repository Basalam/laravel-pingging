<?php

namespace Basalam\Pingging;

use Illuminate\Support\ServiceProvider;

class PinggingServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'pingging');

        $this->publishes([
            __DIR__.'/config/pinging.php' => config_path('pingging.php'),
        ], 'config');

        $this->commands([]);
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/pinging.php', 'pingging');

        $this->app->singleton('pingging', function () {
            return new Pingging;
        });
    }
}
