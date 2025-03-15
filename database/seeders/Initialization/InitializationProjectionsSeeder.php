<?php

namespace Database\Seeders\Initialization;

use Database\Seeders\Initialization\Projections\ProjectionsSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitializationProjectionsSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            ProjectionsSeeder::class,
        ]);
    }
}
