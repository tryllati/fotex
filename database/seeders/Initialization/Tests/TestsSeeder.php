<?php

namespace Database\Seeders\Initialization\Tests;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tests')->insert([
            ['name' => 'Alice', 'task' => 'Task 1', 'age' => 20, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Bob',   'task' => 'Task 2', 'age' => 25, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Carol', 'task' => 'Task 3', 'age' => 30, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Dave',  'task' => 'Task 4', 'age' => 35, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'Eve',   'task' => 'Task 5', 'age' => 40, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ]);
    }
}
