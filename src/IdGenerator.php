<?php

namespace Omaressaouaf\LaravelIdGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string generate(string $model, string $field = 'id',int $paddingLength = 5,?string $prefix = '',?string $suffix = '',)
 *
 * @see \Omaressaouaf\LaravelIdGenerator\IdGeneratorFactory
 */
class IdGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'id-generator';
    }
}
