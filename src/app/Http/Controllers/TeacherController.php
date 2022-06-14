<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{

    //管理者画面のコントローラー

    public function register(){
        $teacher_model = new Teacher();
        $password_plain = createRandomPassword(8);
        return view('admin.register_teacher')->with('password', $password_plain);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:31',
            'email' => 'required|email|unique:teachers,email',
            'password' => 'required|min:8|max:31'
        ]);
        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ],[
            'name.required' => '名前を入力してください',
            'name.max' => '３１文字以内で入力してください',
            'email.email' => 'メールアドレスを入力してください',
            'email.unique' => '既に使用されているメールアドレスです',
        ]);
        $teacher->save();
        return redirect()->route('teacher.manage');
    }

    public function manage_teachers(){
        $teacher_model = new Teacher();
        $teachers = $teacher_model->getListOfTeachers();
        return view('admin.manage_teacher')->with('teachers', $teachers);
    }

    public function destroy($teacher_id){
        $teacher = Teacher::find($teacher_id);
        $teacher->delete();
        return redirect()->route('teacher.manage');
    }


    //教師画面のコントローラー

    public function edit_profile(){
        $teacher = Auth::user();
        return view('teacher.edit_profile')->with(['teacher' => $teacher]);
    }

    public function update_profile(Request $request){
        $teacher = Auth::user();
        $teacher = Teacher::find($teacher->id);
        $request->validate([
            'name' => 'required|max:31',
            'email' => ['required', 'email', Rule::unique('teachers', 'email')->ignore($teacher->id)]
        ]);
        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->save();
        return redirect()->route('teacher.edit_profile');
    }

    public function edit_password(){
        return view('teacher.edit_password');
    }

    public function update_password(Request $request){
        $teacher = Auth::user();
        $teacher = Teacher::find($teacher->id);
        $request->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|max:31|confirmed',
        ]);
        $password_hashed = Hash::make($request->new_password);
        $teacher->password = $password_hashed;
        $teacher->save();
        return redirect()->route('teacher.edit_password');
    }


    //生徒画面のコントローラー
    public function show_teachers(){}

}
