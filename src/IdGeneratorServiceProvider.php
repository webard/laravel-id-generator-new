<?php

namespace Omaressaouaf\LaravelIdGenerator;

use Illuminate\Support\ServiceProvider;

class IdGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('id-generator', fn () => new IdGeneratorFactory);
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-id-generator.php', 'laravel-id-generator');
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-id-generator.php' => config_path('laravel-id-generator.php'),
            ]);
        }
    }
}
