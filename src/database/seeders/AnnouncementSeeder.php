<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = ['加藤悠人', '西田雅哉', '中田', '千原', '川岡', '沖田', '星野', '崎本'];

        for($i = 0; $i < 8; $i++){
            DB::table('announcements')->insert([
                'title' => 'テスト'.($i+1),
                'content' => 'こんにちは。これはテストです。'.$names[$i].'です。元気です。',
                'class_id' => 1,
                'created_at' => '2022-4-'.(10+$i),
            ]);
        }
    }
}
