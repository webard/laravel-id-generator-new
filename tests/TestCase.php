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
        config()->set('database.default', env('DB_CONNECTION', 'sqlite'));

        config()->set('database.connections.sqlite', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        config()->set('database.connections.mysql', [
            'driver' => 'mysql',
            'host' => '127.0.0.1',
            'port' => 3306,
            'database' => 'laravel',
            'username' => 'root',
            'password' => '',
            'prefix' => '',
        ]);

        config()->set('database.connections.mariadb', [
            'driver' => 'mariadb',
            'host' => '127.0.0.1',
            'port' => 3306,
            'database' => 'laravel',
            'username' => 'root',
            'password' => '',
            'prefix' => '',
        ]);

        config()->set('database.connections.pgsql', [
            'driver' => 'pgsql',
            'host' => '127.0.0.1',
            'port' => 5432,
            'database' => 'laravel',
            'username' => 'forge',
            'password' => 'password',
            'prefix' => '',
        ]);

        foreach (File::allFiles(__DIR__.'/Migrations') as $migration) {
            (include $migration->getRealPath())->up();
        }
    }
}
