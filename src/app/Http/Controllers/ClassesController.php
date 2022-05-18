<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    //管理者コントローラー

    public function create($semester_id){
        $teacher_model = new Teacher();
        $teachers = $teacher_model->getListOfTeachers();
        $semester = Semester::find($semester_id);
        $semester_name = $semester->getSentence();
        return view('admin.create_class')->with([
            'teachers' => $teachers,
            'semester_id' => $semester_id,
            'semester_name' => $semester_name
        ]);
    }

    public function store(Request $request ,$semester_id){
        $request->validate([
            'class_name' => 'required|max:63',
            'teacher_id' => 'required|integer'
        ]);
        $class = Classes::create([
            'name' => $request->class_name,
            'teacher_id' => $request->teacher_id,
            'semester_id' => $semester_id,
        ]);
        $class->save();
        return redirect()->route('semester.show_at_admin', $semester_id);
    }

    public function destroy($semester_id, $class_id){
        $class = Classes::find($class_id);
        $class->delete();
        return redirect()->route('semester.show_at_admin', $semester_id);
    }


    //教師コントローラー

    //クラス一覧画面
    public function select_class($semester_id){
        $class = new Classes();
        $classes = $class->getClasses($semester_id);
        $semester = Semester::find($semester_id);
        $semester_name = $semester->getSentence();
        return view('teacher.select_class')->with(['classes' => $classes, 'semester_name' => $semester_name, 'semester_id' => $semester_id]);
    }

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
