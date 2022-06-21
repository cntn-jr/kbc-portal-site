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
            'isCreateStudent' => 1,
        ]);
        DB::table('teachers')->insert([
            'id' => 2,
            'name' => '森 敏',
            'email' => 's-mori@kawahara.ac.jp',
            'password' => Hash::make('password'),
            'isCreateStudent' => 1,
        ]);
        DB::table('teachers')->insert([
            'id' => 3,
            'name' => '小西 弘恭',
            'email' => 'h-konishi@kawahara.ac.jp',
            'password' => Hash::make('password'),
            'isCreateStudent' => 1,
        ]);
        DB::table('teachers')->insert([
            'id' => 4,
            'name' => '林 優子',
            'email' => 'y-hayashi@kawahara.ac.jp',
            'password' => Hash::make('password'),
            'isCreateStudent' => 0,
        ]);
        DB::table('teachers')->insert([
            'id' => 5,
            'name' => '江見 圭司',
            'email' => 'k-emi@kawahara.ac.jp',
            'password' => Hash::make('password'),
            'isCreateStudent' => 0,
        ]);
        DB::table('teachers')->insert([
            'id' => 6,
            'name' => '花山 薫',
            'email' => 'm-yamahana@kawahara.ac.jp',
            'password' => Hash::make('password'),
            'isCreateStudent' => 0,
        ]);
        DB::table('teachers')->insert([
            'id' => 7,
            'name' => '山下 秋芳',
            'email' => 'a-yamashita@kawahara.ac.jp',
            'password' => Hash::make('password'),
            'isCreateStudent' => 0,
        ]);
    }
}
