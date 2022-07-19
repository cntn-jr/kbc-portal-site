<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GakuensaiBelongClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 41; $i++){
            DB::table('belong_classes')->insert([
                'class_id' => 1,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 3,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 4,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 7,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 8,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 11,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 12,
                'student_id' => $i,
            ]);
        }

        for($i = 41; $i < 71; $i++){
            DB::table('belong_classes')->insert([
                'class_id' => 2,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 5,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 6,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 9,
                'student_id' => $i,
            ]);
            DB::table('belong_classes')->insert([
                'class_id' => 10,
                'student_id' => $i,
            ]);
        }
    }
}
