<?php

namespace Omaressaouaf\LaravelIdGenerator\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Omaressaouaf\LaravelIdGenerator\Models\TestModel;

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
