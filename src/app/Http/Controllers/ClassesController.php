<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Belong_class;
use App\Models\Classes;
use App\Models\Curriculum;
use App\Models\Lesson;
use App\Models\Schedule;
use App\Models\Semester;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

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
        $classes = arrayChunkObject($classes, 3);
        $semester = Semester::find($semester_id);
        $semester_name = $semester->getSentence();
        return view('teacher.select_class')->with(['classes' => $classes, 'semester_name' => $semester_name, 'semester_id' => $semester_id]);
    }

    //クラス画面
    public function show_at_teacher($class_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        $curriculum_model = new Curriculum();
        $curriculum = $curriculum_model->getCurriculum($class_id);
        $dayOfTheWeeks = ['月', '火', '水', '木', '金',];
        $announcement_model = new Announcement();
        $announcements = $announcement_model->getAnnouncementsLast5($class_id);
        $schedule_model = new Schedule();
        $schedules = $schedule_model->getSchedule($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        // 担任教師以外は別の画面を表示する
        if($class->isResponsibleClass($login_user->id)){
            return view('teacher.show_class')->with([
                'curriculum' => $curriculum,
                'class' => $class,
                'dayOfTheWeeks' => $dayOfTheWeeks,
                'semester_name' => $semester_name,
                'announcements' => $announcements,
                'schedules' => $schedules,
            ]);
        }else{
            return view('teacher.common.show_class')->with([
                'curriculum' => $curriculum,
                'class' => $class,
                'dayOfTheWeeks' => $dayOfTheWeeks,
                'semester_name' => $semester_name,
                'announcements' => $announcements,
                'schedules' => $schedules,
            ]);
        }
    }

    //クラスに生徒を追加する（所属させる）
    public function add_students($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任教師でなければホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $students = [];
        $search_param = '';
        if($request->search_param){
            $search_param = $request->search_param;
            $students = Student::where('email', 'LIKE', '%'.$search_param.'%')
                ->get();
        }
        return view('teacher.students.search_students')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'students' => $students,
            'search_param' => $search_param,
        ]);
    }

    //クラスに生徒を追加する（所属させる保存処理）
    public function store_add_students($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任教師でなければ、ホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $students = [];
        foreach($request->all() as $index => $student_id){
            if( preg_match('/^student_id[0-9]+$/', $index) ){
                $request->validate([
                    $index => ['required', 'integer',]
                ]);
                $belong_class = Belong_class::where('student_id', $student_id)
                    ->where('class_id', $class_id)
                    ->first();
                // クラスと生徒が結びついていなければ
                if(!$belong_class){
                    array_push($students, $student_id);
                }
            }
        }
        $class->addStudents($students);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $students = Student::whereIn('id', $students)->get();
        return view('teacher.students.result_add_students')->with([
            'semester_name' => $semester_name,
            'class' => $class,
            'students' => $students
        ]);
    }

    //生徒をクラスから開放する
    public function leave_student($class_id, $student_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任教師でなければ、ホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $belong_class = Belong_class::where('class_id', $class_id)
            ->where('student_id', $student_id)
            ->first();
        $belong_class->delete();
        return redirect()->route('class.show_students', $class_id);
    }

    public function show_students($class_id){
        $class = Classes::find($class_id);
        $students = [];
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $student_model = new Student();
        $students = $student_model->getStudentsOnClass($class_id);
        $login_user = Auth::user();
        // 担任以外の教師は編集画面を表示しない
        if(!$class->isResponsibleClass($login_user->id)){
            $students = arrayChunkObject($students, 3);
            return view('teacher.common.show_students')->with([
                'semester_name' => $semester_name,
                'class' => $class,
                'students' => $students
            ]);
        }else
            return view('teacher.students.show_students')->with([
                'semester_name' => $semester_name,
                'class' => $class,
                'students' => $students
            ]);
    }

    //クラスの編集（クラス名やカリキュラムなど）
    public function edit($class_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任教師でなければ、ホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $curriculum_model = new Curriculum();
        $curriculum = $curriculum_model->getCurriculum($class_id);
        $dayOfTheWeeks = ['月', '火', '水', '木', '金',];
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $lesson_model = new Lesson();
        $class_lessons = $lesson_model->getLessons($class_id);
        return view('teacher.edit_class')->with([
            'curriculum' => $curriculum,
            'class' => $class,
            'dayOfTheWeeks' => $dayOfTheWeeks,
            'semester_name' => $semester_name,
            'class_lessons' => $class_lessons,
        ]);
    }

    //クラス名の更新
    public function update($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任教師でなければ、ホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'class_name' => 'required|max:63'
        ]);
        $class->name = $request->class_name;
        $class->save();
        return redirect()->route('class.edit', $class_id);
    }


    //生徒コントローラー
    public function show_at_student($class_id){
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $curriculum_model = new Curriculum();
        $curriculum = $curriculum_model->getCurriculum($class_id);
        $dayOfTheWeeks = ['月', '火', '水', '木', '金',];
        $announcement_model = new Announcement();
        $announcements = $announcement_model->getAnnouncementsLast5($class_id);
        $schedule_model = new Schedule();
        $schedules = $schedule_model->getSchedule($class_id);
        return view('student.show_class')->with([
            'curriculum' => $curriculum,
            'class' => $class,
            'dayOfTheWeeks' => $dayOfTheWeeks,
            'semester_name' => $semester_name,
            'announcements' => $announcements,
            'schedules' => $schedules,
        ]);
    }
}
