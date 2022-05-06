<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teachers')->insert([
            'id' => 1,
            'name' => '那須 道生',
            'email' => 'm-nasu@kawahara.ac.jp',
            'password' => Hash::make('password'),
        ]);
        DB::table('teachers')->insert([
            'id' => 2,
            'name' => '森 敏',
            'email' => 's-mori@kawahara.ac.jp',
            'password' => Hash::make('password'),
        ]);
    }
}
