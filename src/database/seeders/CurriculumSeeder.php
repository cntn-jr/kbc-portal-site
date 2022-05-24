<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 0,#月曜日
            'period' => 1,
            'lesson_id' => 1,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 0,
            'period' => 2,
            'lesson_id' => 1,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 1,#火曜日
            'period' => 1,
            'lesson_id' => 2,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 1,
            'period' => 2,
            'lesson_id' => 2,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 1,
            'period' => 3,
            'lesson_id' => 3,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 2,#水曜日
            'period' => 1,
            'lesson_id' => 2,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 2,#水曜日
            'period' => 2,
            'lesson_id' => 2,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 2,#水曜日
            'period' => 3,
            'lesson_id' => 4,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 3,#木曜日
            'period' => 1,
            'lesson_id' => 5,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 3,#木曜日
            'period' => 2,
            'lesson_id' => 5,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 3,#木曜日
            'period' => 3,
            'lesson_id' => 6,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 4,#金曜日
            'period' => 1,
            'lesson_id' => 6,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 4,#金曜日
            'period' => 2,
            'lesson_id' => 6,
        ]);
        DB::table('curriculums')->insert([
            'dayOfTheWeek' => 4,#金曜日
            'period' => 3,
            'lesson_id' => 6,
        ]);
    }
}
