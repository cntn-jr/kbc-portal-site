<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'name' => '千原 吉彦',
            'email' => 'kbc19a21@stu.kawahara.ac.jp',
            'password' => Hash::make('password'),
            'attend_num' => 4
        ]);
    }
}
