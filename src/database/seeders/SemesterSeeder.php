<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('semesters')->insert([
            'id' => 1,
            'year' => 2022,
            'isEarlyPeriod' => true,//前期
        ]);
        DB::table('semesters')->insert([
            'id' => 2,
            'year' => 2021,
            'isEarlyPeriod' => false,//後期
        ]);
        DB::table('semesters')->insert([
            'id' => 3,
            'year' => 2021,
            'isEarlyPeriod' => true,
        ]);
        DB::table('semesters')->insert([
            'id' => 4,
            'year' => 2020,
            'isEarlyPeriod' => false,
        ]);
        DB::table('semesters')->insert([
            'id' => 5,
            'year' => 2020,
            'isEarlyPeriod' => true,
        ]);
    }
}
