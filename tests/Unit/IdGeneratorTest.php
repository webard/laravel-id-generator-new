<?php

namespace Omaressaouaf\LaravelIdGenerator\Tests\Unit;

use Carbon\Carbon;
use Omaressaouaf\LaravelIdGenerator\IdGenerator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Omaressaouaf\LaravelIdGenerator\Tests\TestCase;
use Omaressaouaf\LaravelIdGenerator\Tests\Models\TestModel;

class IdGeneratorTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_generates_id_with_prefix_and_suffix(): void
    {
        TestModel::factory()->create(['custom_id' => 'USR-00001-2024']);

        $customId = IdGenerator::generate(TestModel::class, 'custom_id', 5, 'USR-', '-2024');

        $this->assertEquals('USR-00002-2024', $customId);
    }

    public function test_it_generates_id_with_custom_padding(): void
    {
        TestModel::factory()->create(['custom_id' => 'ORD-000005-2024']);

        $customId = IdGenerator::generate(TestModel::class, 'custom_id', 6, 'ORD-', '-2024');

        $this->assertEquals('ORD-000006-2024', $customId);
    }

    public function test_it_generates_id_with_no_prefix_and_suffix(): void
    {
        TestModel::factory()->create(['custom_id' => '00001']);

        $customId = IdGenerator::generate(TestModel::class, 'custom_id');

        $this->assertEquals('00002', $customId);
    }

    public function test_it_handles_empty_table(): void
    {
        $customId = IdGenerator::generate(TestModel::class, 'custom_id', 5, 'TX-', '-2024');

        $this->assertEquals('TX-00001-2024', $customId);
    }

    public function test_it_resets_when_prefix_and_suffix_dont_match(): void
    {
        TestModel::factory()->create(['custom_id' => '00001']);

        $customId = IdGenerator::generate(TestModel::class, 'custom_id', 5, 'INV-');

        $this->assertEquals('INV-00001', $customId);
    }

     public function test_it_replaces_date_variable(): void
     {
         Carbon::setTestNow('2025-02-28');

         $customId = IdGenerator::generate(TestModel::class, 'custom_id', 5, 'INV-', '-{DATE}');

         $this->assertEquals('INV-00001-2025-02-28', $customId);
     }

     public function test_it_replaces_month_variable(): void
     {
         Carbon::setTestNow('2025-02-28');

         $customId = IdGenerator::generate(TestModel::class, 'custom_id', 5, 'INV-', '-{MONTH}');

         $this->assertEquals('INV-00001-2025-02', $customId);
     }

     public function test_it_replaces_year_variable(): void
     {
         Carbon::setTestNow('2025-02-28');

         $customId = IdGenerator::generate(TestModel::class, 'custom_id', 5, '{YEAR}-');

         $this->assertEquals('2025-00001', $customId);
     }
}
