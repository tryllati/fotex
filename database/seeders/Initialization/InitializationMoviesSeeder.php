<?php

namespace Database\Seeders\Initialization;

use Database\Seeders\Initialization\Movies\MoviesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitializationMoviesSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        $this->call([
            MoviesSeeder::class,
        ]);
    }
}
