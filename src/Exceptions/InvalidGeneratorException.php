<?php

namespace Omaressaouaf\LaravelIdGenerator\Exceptions;

use Exception;

class InvalidGeneratorException extends Exception
{
    public function __construct()
    {
        parent::__construct('Invalid generator config, make sure the generator exists and has valid properties');
    }
}
