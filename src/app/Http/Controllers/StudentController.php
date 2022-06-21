<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //教師コントローラー

    public function create_account($class_id){
        $login_user = Auth::user();
        // 生徒を作成する権限ない教師はホームにリダイレクトさせる
        if(!$login_user->isCreateStudent)
            return redirect()->route('teacher.home');
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        return view('teacher.students.register_student')->with([
            'class' => $class,
            'semester_name' => $semester_name,
        ]);
    }

    public function store_account($class_id, Request $request){
        $login_user = Auth::user();
        // 生徒を作成する権限ない教師はホームにリダイレクトさせる
        if(!$login_user->isCreateStudent)
            return redirect()->route('teacher.home');
        $csv_file_path = $request->file('student_csv')->path();
        $students = readCsv($csv_file_path);
        $student_model = new Student();
        if(!$student_model->validateStudents($students))
            return redirect()->route('student.create_account', $class_id);

        $student_emails = [];

        foreach($students as $student){
            Student::create([
                'name' => $student['1'],
                'email'=> $student['2'],
                'attend_num' => $student['0'],
                'password' => $student_model->createDefaultPassword($student['2']),
            ]);
            array_push($student_emails, $student['2']);
        }
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $students = Student::whereIn('email', $student_emails)->get();
        return view('teacher.students.result_register_account')->with([
            'semester_name' => $semester_name,
            'class' => $class,
            'students' => $students
        ]);
    }


    //生徒コントローラー

    public function edit_profile(){
        $student = Auth::user();
        return view('student.edit_profile')->with(['student' => $student]);
    }

    public function update_profile(Request $request){
        $student = Auth::user();
        $student = Student::find($student->id);
        $request->validate([
            'name' => 'required|max:31',
            'attend_num' => 'required|integer',
            'email' => ['required', 'email', Rule::unique('students', 'email')->ignore($student->id)]
        ]);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->attend_num = $request->attend_num;
        $student->save();
        return redirect()->route('student.edit_profile');
    }

    public function edit_password(){
        return view('student.edit_password');
    }

    public function update_password(Request $request){
        $student = Auth::user();
        $student = Student::find($student->id);
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|max:31|confirmed',
        ]);
        $password_hashed = Hash::make($request->new_password);
        $student->password = $password_hashed;
        $student->save();
        return redirect()->route('student.edit_password');
    }

    public function show_students_in_class($class_id){
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $student_model = new Student();
        $students = $student_model->getStudentsOnClass($class_id);
        $students = arrayChunkObject($students, 3);
        return view('common.show_students')->with([
            'semester_name' => $semester_name,
            'class' => $class,
            'students' => $students
        ]);
    }
}
