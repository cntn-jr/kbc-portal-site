<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    //教師コントローラー

    //授業一覧画面
    public function show_lessons_at_teacher($class_id){}

    //授業追加画面
    public function create($class_id){}

    //授業保存処理
    public function store($class_id){}

    //授業編集画面
    public function edit($class_id, $lesson_id){}

    //授業更新処理
    public function update($class_id, $lesson_id){}


    //生徒コントローラー
    public function show_lesson($lesson_id){}

}
