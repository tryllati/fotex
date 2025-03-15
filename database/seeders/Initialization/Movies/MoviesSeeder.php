<?php

namespace Database\Seeders\Initialization\Movies;

use App\Enums\MovieLanguageTypeEnum;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            'name'        => "A piszkos hadviselés minisztériuma (The Ministry of Ungentlemanly Warfare)",
            'description' => "A piszkos hadviselés minisztériuma 2024-ben bemutatott amerikai–brit akció-filmvígjáték, amelynek rendezője, társírója és társproducere Guy Ritchie. A főbb szerepekben Henry Cavill, Eiza González, Alan Ritchson, Henry Golding és Alex Pettyfer látható.",
            'age_limit'   => 12,
            'language'    => MovieLanguageTypeEnum::HUNGARIAN->value,
            'cover_image' => 'the-ministry-of-ungentlemanly-warfare.webp',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('movies')->insert([
            'name'        => "Captain America: Brave New World",
            'description' => "Some time after the events of The Falcon and the Winter Soldier, Sam Wilson has now fully embraced his title as the new Captain America. Now Sam is summoned to the White House as the new president Ross wants to work with him on rebuilding the Avengers. But trouble ensues when Sam's friend Isaiah Bradley uncontrollably tries to assassinate the president and is framed for the attempt.",
            'age_limit'   => 16,
            'language'    => MovieLanguageTypeEnum::ENGLISH->value,
            'cover_image' => 'captainamericabravenewworld.jpeg',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
