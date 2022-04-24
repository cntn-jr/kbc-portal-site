<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //教師コントローラー

    public function create_account(){}

    public function store_account(){}


    //生徒コントローラー

    public function edit_profile($student_id){}

    public function update_profile($student_id){}

    public function edit_password($student_id){}

    public function update_password($student_id){}

    public function show_students_in_class($class_id){}
}
