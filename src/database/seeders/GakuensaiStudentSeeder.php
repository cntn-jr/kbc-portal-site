<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GakuensaiStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 41; $i++){
            DB::table('students')->insert([
                'name' => '生徒 太郎'.$i,
                'email' => 'student'.$i.'@example.com',
                'password' => Hash::make('password'),
                'attend_num' => $i
            ]);
        }

        for($i = 41; $i < 71; $i++){
            DB::table('students')->insert([
                'name' => '生徒 太郎'.$i,
                'email' => 'student'.$i.'@example.com',
                'password' => Hash::make('password'),
                'attend_num' => $i - 40
            ]);
        }
    }
}
