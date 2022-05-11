<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //管理者コントローラー

    public function select_at_admin(){
        $semester = new Semester();
        $semesters = $semester->getSemesters();
        return view('admin.select_semester')->with('semesters', $semesters);
    }

    public function show_at_admin($semester_id){
        $class = new Classes();
        $classes = $class->getClasses($semester_id);
        $semester = Semester::find($semester_id);
        $semester_name = $semester->getSentence();
        return view('admin.show_semester')->with(['classes' => $classes, 'semester_name' => $semester_name, 'semester_id' => $semester_id]);
    }

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
