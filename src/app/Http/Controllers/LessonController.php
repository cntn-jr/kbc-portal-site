<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Lesson;
use App\Models\Semester;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    //教師コントローラー

    //授業一覧画面
    public function show_lessons_at_teacher($class_id){
        $lesson_model = new Lesson();
        $lessons = $lesson_model->getLessons($class_id);
        $lessons = arrayChunkObject($lessons, 3);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $class = Classes::find($class_id);
        return view('teacher.lesson.show_lessons')->with([
            'lessons' => $lessons,
            'semester_name' => $semester_name,
            'class' => $class,
        ]);
    }

    //授業追加画面
    public function create($class_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $teacher_model = new Teacher();
        $teachers = $teacher_model->getListOfTeachers();
        return view('teacher.lesson.create_lesson')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'teachers' => $teachers,
        ]);
    }

    //授業保存処理
    public function store($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'name' => ['required', 'max:31'],
            'outline' => ['max:255'],
            'teacher_id' => ['integer']
        ]);
        Lesson::create([
            'name' => $request->name,
            'outline' => $request->outline,
            'teacher_id' => $request->teacher_id,
            'class_id' => $class_id,
        ]);
        return redirect()->route('class.show_lessons', [
            'class_id' => $class_id,
        ]);
    }

    //授業編集画面
    public function edit($class_id, $lesson_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        $lesson = Lesson::find($lesson_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $teacher_model = new Teacher();
        $teachers = $teacher_model->getListOfTeachers();
        $login_user = Auth::user();
        // 担任以外の教師は編集させない
        if(!$class->isResponsibleClass($login_user->id)){
            $lesson_model = new Lesson();
            $lesson = $lesson_model->getLesson($lesson_id);
            return view('teacher.common.show_lesson')->with([
                'class' => $class,
                'lesson' => $lesson,
                'semester_name' => $semester_name,
            ]);
        }else
            return view('teacher.lesson.edit_lesson')->with([
                'class' => $class,
                'lesson' => $lesson,
                'semester_name' => $semester_name,
                'teachers' => $teachers,
            ]);
    }

    //授業更新処理
    public function update($class_id, $lesson_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'name' => ['required', 'max:31'],
            'outline' => ['max:255'],
            'teacher_id' => ['integer']
        ]);
        $lesson = Lesson::find($lesson_id);
        $lesson->name = $request->name;
        $lesson->outline = $request->outline;
        $lesson->teacher_id = $request->teacher_id;
        $lesson->save();
        return redirect()->route('lesson.edit', [
            'class_id' => $class_id,
            'lesson_id' => $lesson_id
        ]);
    }


    //生徒コントローラー
    public function show_lesson($class_id, $lesson_id){
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $lesson_model = new Lesson();
        $lesson = $lesson_model->getLesson($lesson_id);
        return view('student.show_lesson')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'lesson' => $lesson,
        ]);
    }

}
