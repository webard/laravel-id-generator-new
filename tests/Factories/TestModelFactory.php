<?php

namespace Omaressaouaf\LaravelIdGenerator\Tests\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Omaressaouaf\LaravelIdGenerator\Tests\Models\TestModel;

class TestModelFactory extends Factory
{
    protected $model = TestModel::class;

    public function definition()
    {
        return [
            'custom_id' => 'test-00001'
        ];
    }
}
