<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //教師コントローラー

    public function create_account($class_id){
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentence();
        return view('teacher.register_student')->with([
            'class' => $class,
            'semester_name' => $semester_name,
        ]);
    }

    public function store_account($class_id, Request $request){
        $csv_file_path = $request->file('student_csv')->path();
        $students = readCsv($csv_file_path);
        $student_model = new Student();
        if(!$student_model->validateStudents($students))
            return redirect()->route('student.create_account', $class_id);

        foreach($students as $student){
            Student::create([
                'name' => $student['1'],
                'email'=> $student['2'],
                'attend_num' => $student['0'],
                'password' => $student_model->createDefaultPassword($student['2']),
            ]);
        }

        dd('stop');

        return redirect()->route('class.add_students', $class_id);
    }


    //生徒コントローラー

    public function edit_profile($student_id){}

    public function update_profile($student_id){}

    public function edit_password($student_id){}

    public function update_password($student_id){}

    public function show_students_in_class($class_id){}
}
