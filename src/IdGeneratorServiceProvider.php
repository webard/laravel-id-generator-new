<?php

namespace Omaressaouaf\LaravelIdGenerator;

use Illuminate\Support\ServiceProvider;

class IdGeneratorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('id-generator', fn () => new IdGeneratorFactory);
    }
}
