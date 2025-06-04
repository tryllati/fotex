<?php

namespace Database\Seeders\Initialization;

use Database\Seeders\Initialization\Tests\TestsSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitializationTestsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            TestsSeeder::class,
        ]);
    }
}
