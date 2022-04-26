<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //管理者コントローラー

    public function create($semester_id){}

    public function store($semester_id){}

    public function destroy($semester_id, $class_id){}


    //教師コントローラー

    //クラス一覧画面
    public function select_class($semester_id){}

    //クラス画面
    public function show_at_teacher($class_id){}

    //クラスに生徒を追加する（所属させる）
    public function add_students($class_id){}

    public function store_add_students($class_id){}

    //生徒をクラスから開放する
    public function leave_students($class_id){}

    //クラスの編集（クラス名やカリキュラムなど）
    public function edit($class_id){}

    //クラス名の更新
    public function update($class_id){}


    //生徒コントローラー
    public function show_at_student($class_id){}
}
