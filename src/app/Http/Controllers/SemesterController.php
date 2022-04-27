<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //管理者コントローラー

    public function select_at_admin(){
        return view('admin.select_semester');
    }

    public function show_at_admin(){}

    public function create(){}

    public function store(){}

    public function edit($semester_id){}

    public function update($semester_id){}

    public function destroy($semester_id){}


    //教師コントローラー

    public function select_at_teacher(){
        return view('teacher.select_semester');
    }

    public function show_at_teacher(){}


    //生徒コントローラー

    public function select_at_student(){
        return view('student.select_semester');

    }

    public function show_at_student(){}
}
