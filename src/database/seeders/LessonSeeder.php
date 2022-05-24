<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'id' => 1,
            'name' => '機械学習',
            'outline'=> '',
            'class_id' => '1',
            'teacher_id' => '3'
        ]);
        DB::table('lessons')->insert([
            'id' => 2,
            'name' => 'システム開発演習',
            'outline'=> '',
            'class_id' => '1',
            'teacher_id' => '4'
        ]);
        DB::table('lessons')->insert([
            'id' => 3,
            'name' => 'AI概論',
            'outline'=> '',
            'class_id' => '1',
            'teacher_id' => '5'
        ]);
        DB::table('lessons')->insert([
            'id' => 4,
            'name' => 'ISMS',
            'outline'=> '',
            'class_id' => '1',
            'teacher_id' => '6'
        ]);
        DB::table('lessons')->insert([
            'id' => 5,
            'name' => 'ソフトウェア品質管理',
            'outline'=> '',
            'class_id' => '1',
            'teacher_id' => '6'
        ]);
        DB::table('lessons')->insert([
            'id' => 6,
            'name' => 'IoT',
            'outline'=> '',
            'class_id' => '1',
            'teacher_id' => '7'
        ]);
    }
}
