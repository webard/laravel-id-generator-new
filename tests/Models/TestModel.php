<?php

namespace Omaressaouaf\LaravelIdGenerator\Tests\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Omaressaouaf\LaravelIdGenerator\Tests\Factories\TestModelFactory;

class TestModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return TestModelFactory::new();
    }
}
