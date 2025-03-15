<?php

namespace Database\Seeders;

use Database\Seeders\Initialization\InitializationMoviesSeeder;
use Database\Seeders\Initialization\InitializationProjectionsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            InitializationMoviesSeeder::class,
            InitializationProjectionsSeeder::class,
        ]);
    }
}
