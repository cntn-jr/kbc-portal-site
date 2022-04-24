<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //管理者コントローラー

    public function create($semester_id){}

    public function store($semester_id){}


    //教師コントローラー

    //クラス一覧画面
    public function select_class($semester_id){}

    //クラス画面
    public function show_at_teacher($class_id){}

    public function add_student($class_id){}

    //クラスの編集（クラス名やカリキュラムなど）
    public function edit($class_id){}

    //クラス名の更新
    public function update($class_id){}


    //生徒コントローラー
    public function show_at_student($class_id){}
}
