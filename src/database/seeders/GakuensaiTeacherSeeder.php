<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GakuensaiTeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 6; $i++){
            DB::table('teachers')->insert([
                'id' => $i,
                'name' => '先生 太郎'.$i,
                'email' => 'teacher'.$i.'@example.com',
                'password' => Hash::make('password'),
                'isCreateStudent' => 1,
            ]);
        }

        for($i = 6; $i < 11; $i++){
            DB::table('teachers')->insert([
                'id' => $i,
                'name' => '先生 太郎'.$i,
                'email' => 'teacher'.$i.'@example.com',
                'password' => Hash::make('password'),
                'isCreateStudent' => 0,
            ]);
        }

    }
}
