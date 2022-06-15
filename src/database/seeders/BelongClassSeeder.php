<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BelongClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('belong_classes')->insert([
            'class_id' => 1,
            'student_id' => 1,
        ]);
        DB::table('belong_classes')->insert([
            'class_id' => 5,
            'student_id' => 1,
        ]);
        DB::table('belong_classes')->insert([
            'class_id' => 6,
            'student_id' => 1,
        ]);
    }
}
