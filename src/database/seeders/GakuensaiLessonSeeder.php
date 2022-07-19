<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GakuensaiLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [
            'java', //0
            'PHP', //1
            'Python', //2
            'JavaScript', //3
            'HTML/CSS', //4
            '国家試験対策', //5
            'Ruby', //6
            'Go', //7
            'React', //8
            'MYSQL', //9
            '卒業制作', //10
            'IoT', //11
            '機械学習', //12
            'Vue', //13
            'Servlet' //14
        ];
        $lesson1 = [5, 7, 8, 10, 12];
        $teacher1 = [1, 6, 7, 1, 3];
        $lesson2 = [5, 3, 6, 9, 11];
        $teacher2 = [2, 4, 7, 8, 9];
        $lesson3 = [5, 6, 11, 13, 14];
        $teacher3 = [1, 7, 9, 10, 10];
        $lesson4 = [5, 0, 1, 2, 3, 4];
        $teacher4 = [1, 3, 4, 7, 5];
        $lessons_outline = [
            'プログラミング言語のJavaについて学習します。',
            'プログラミング言語のPHPについて学習します。',
            'プログラミング言語のPythonについて学習します。',
            'プログラミング言語のJavaScriptについて学習します。',
            'Webサイトの基礎となるHTML/CSSについて学習します。',
            '主に、基本情報技術者試験または応用情報技術者試験の対策を行います。',
            'プログラミング言語のRubyについて学習します。',
            'プログラミング言語のGoについて学習します。',
            'JavaScriptのフレームワークであるReactについて学習します。',
            'データベースやSQLについて、MYSQLを用いて学習します。',
            '今まで学習したことを発揮してグループで成果物を作成します。',
            '昨今の流行りであるIoTについて手を動かしながら学習します。',
            '流行中のAIを用いた機械学習をPythonを中心に使用し、学習します。',
            'JavaScriptのフレームワークであるReactについて学習します。',
            'JavaのフレームワークであるServletについて学習します。',
        ];
        for($i = 0; $i < 5; $i++){
            $lessons_num = $lesson1[$i];
            DB::table('lessons')->insert([
                'id' => $i + 1,
                'name' => $lessons[$lessons_num],
                'outline'=> $lessons_outline[$lessons_num],
                'class_id' => '1',
                'teacher_id' => $teacher1[$i],
            ]);
        }

        for($i = 5; $i < 10; $i++){
            $lessons_num = $lesson2[$i - 5];
            DB::table('lessons')->insert([
                'id' => $i + 1,
                'name' => $lessons[$lessons_num],
                'outline'=> $lessons_outline[$lessons_num],
                'class_id' => '2',
                'teacher_id' => $teacher2[$i - 5],
            ]);
        }

        for($i = 10; $i < 15; $i++){
            $lessons_num = $lesson3[$i - 10];
            DB::table('lessons')->insert([
                'id' => $i + 1,
                'name' => $lessons[$lessons_num],
                'outline'=> $lessons_outline[$lessons_num],
                'class_id' => '4',
                'teacher_id' => $teacher3[$i - 10],
            ]);
        }

        for($i = 15; $i < 20; $i++){
            $lessons_num = $lesson4[$i - 15];
            DB::table('lessons')->insert([
                'id' => $i + 1,
                'name' => $lessons[$lessons_num],
                'outline'=> $lessons_outline[$lessons_num],
                'class_id' => '3',
                'teacher_id' => $teacher4[$i - 15],
            ]);
        }

    }
}
