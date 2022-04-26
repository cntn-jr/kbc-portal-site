<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{

    //管理者画面のコントローラー

    public function register(){}

    public function store(){}

    public function manage_teachers(){}

    public function destroy($teacher_id){}


    //教師画面のコントローラー

    public function edit_profile($teacher_id){}

    public function update_profile($teacher_id){}

    public function edit_password($teacher_id){}

    public function update_password($teacher_id){}


    //生徒画面のコントローラー
    public function show_teachers(){}

}
