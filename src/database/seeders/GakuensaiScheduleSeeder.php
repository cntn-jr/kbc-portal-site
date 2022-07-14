<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GakuensaiScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-7-16',
            'detail' => '学園祭',
            'class_id' => 1
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-7-17',
            'detail' => '学園祭',
            'class_id' => 1
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-7-16',
            'detail' => '学園祭',
            'class_id' => 2
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-7-17',
            'detail' => '学園祭',
            'class_id' => 2
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-7-23',
            'detail' => '夏休み初日',
            'class_id' => 1
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-8-21',
            'detail' => '夏休み終了日',
            'class_id' => 1
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-7-23',
            'detail' => '夏休み初日',
            'class_id' => 2
        ]);
        DB::table('schedules')->insert([
            'scheduledDate' => '2022-8-21',
            'detail' => '夏休み終了日',
            'class_id' => 2
        ]);
    }
}
