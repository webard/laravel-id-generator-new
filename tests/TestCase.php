<?php

namespace Omaressaouaf\LaravelIdGenerator\Tests;

use Illuminate\Support\Facades\File;
use Omaressaouaf\LaravelIdGenerator\IdGeneratorServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            IdGeneratorServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        foreach (File::allFiles(__DIR__ . '/Migrations') as $migration) {
            (include $migration->getRealPath())->up();
        }
    }
}
