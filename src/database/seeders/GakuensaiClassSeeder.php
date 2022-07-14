<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GakuensaiClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            'id' => 1,
            'name' => 'ITエンジニア科4年',
            'teacher_id' => 1,
            'semester_id' => 1, //2022年度　前期
        ]);
        DB::table('classes')->insert([
            'id' => 2,
            'name' => 'ITエンジニア科3年',
            'teacher_id' => 2,
            'semester_id' => 1, //2022年度　前期
        ]);
        DB::table('classes')->insert([
            'id' => 3,
            'name' => 'ITエンジニア科3年',
            'teacher_id' => 1,
            'semester_id' => 2, //2021年度　後期
        ]);
        DB::table('classes')->insert([
            'id' => 4,
            'name' => 'ITエンジニア科3年',
            'teacher_id' => 1,
            'semester_id' => 3, //2021年度　前期
        ]);
        DB::table('classes')->insert([
            'id' => 5,
            'name' => 'ITエンジニア科2年',
            'teacher_id' => 2,
            'semester_id' => 2,//2021年度　後期
        ]);
        DB::table('classes')->insert([
            'id' => 6,
            'name' => 'ITエンジニア科2年',
            'teacher_id' => 2,
            'semester_id' => 3, //2021年度　前期
        ]);
        DB::table('classes')->insert([
            'id' => 7,
            'name' => 'ITエンジニア科2年',
            'teacher_id' => 3,
            'semester_id' => 4, //2020年度　後期
        ]);
        DB::table('classes')->insert([
            'id' => 8,
            'name' => 'ITエンジニア科2年',
            'teacher_id' => 3,
            'semester_id' => 5, //2020年度　前期
        ]);
        DB::table('classes')->insert([
            'id' => 9,
            'name' => 'ITエンジニア科1年',
            'teacher_id' => 2,
            'semester_id' => 4, //2020年度　後期
        ]);
        DB::table('classes')->insert([
            'id' => 10,
            'name' => 'ITエンジニア科1年',
            'teacher_id' => 2,
            'semester_id' => 5, //2020年度　前期
        ]);
        DB::table('classes')->insert([
            'id' => 11,
            'name' => 'ITエンジニア科1年',
            'teacher_id' => 4,
            'semester_id' => 6, //2019年度　後期
        ]);
        DB::table('classes')->insert([
            'id' => 12,
            'name' => 'ITエンジニア科1年',
            'teacher_id' => 4,
            'semester_id' => 7, //2019年度　前期
        ]);
    }
}
