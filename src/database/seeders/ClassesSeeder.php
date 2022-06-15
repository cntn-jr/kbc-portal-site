<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
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
            'semester_id' => 1,
        ]);
        DB::table('classes')->insert([
            'id' => 2,
            'name' => 'ITイノベーション科1年',
            'teacher_id' => 2,
            'semester_id' => 1,
        ]);
        DB::table('classes')->insert([
            'id' => 3,
            'name' => 'ITエンジニア科3年',
            'teacher_id' => 1,
            'semester_id' => 1,
        ]);
        DB::table('classes')->insert([
            'id' => 4,
            'name' => 'ITイノベーション科2年',
            'teacher_id' => 2,
            'semester_id' => 1,
        ]);
        DB::table('classes')->insert([
            'id' => 5,
            'name' => 'ITエンジニア科3年',
            'teacher_id' => 1,
            'semester_id' => 2,
        ]);
        DB::table('classes')->insert([
            'id' => 6,
            'name' => 'ITエンジニア科3年',
            'teacher_id' => 1,
            'semester_id' => 3,
        ]);
    }
}
