<?php

namespace Database\Seeders\Initialization\Projections;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projections')->insert([
            'date'        => '2025.12.23 20:00',
            'empty_place' => 128,
            'movie_id'    => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
