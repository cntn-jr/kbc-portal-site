<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Classes extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = ['name', 'teacher_id', 'semester_id'];

    //指定した生徒がそのクラスに所属しているかどうか
    //classes::find($id)->isBlongClass($student_id)
    public function isBlongClass($student_id){
        $student = DB::table('classes')
            ->join('belong_classes', 'classes.id', '=', 'belong_classes.class_id')
            ->where('belong_classes.class_id', $this->id)
            ->where('belong_classes.student_id', $student_id)
            ->count();
        if($student)
            return true;
        return false;
    }

    //指定した教師がそのクラスの担任をしているかどうか
    //classes::find($id)->isResponsibleClass($teacher_id)
    public function isResponsibleClass($teacher_id){
        $class = Classes::find($this->id);
        $class_teacher_id = $class->teacher_id;
        if($teacher_id == $class_teacher_id)
            return true;
        return false;
    }

    //指定した学期の指定した教師が担任をしているクラス
    public function getClassesOfHomeroomTeacher($semester_id, $teacher_id){
        return Classes::where('semester_id', $semester_id)
            ->where('teacher_id', $teacher_id)
            ->get();
    }

    //指定した学期に存在するクラス
    public function getClasses($semester_id){
        $classes = DB::table('classes')
            ->select('classes.id as class_id', 'classes.name as class_name', 'teachers.name as teacher_name', 'teachers.email')
            ->join('teachers', 'classes.teacher_id', '=' ,'teachers.id')
            ->where('classes.semester_id', $semester_id)
            ->orderBy('class_name', 'asc')
            ->get();
        return $classes;
    }

    public function addStudents($students){
        $class = Classes::find($this->id);
        foreach($students as $student){
            Belong_class::create([
                'student_id' => $student,
                'class_id' => $class->id,
            ]);
        }
    }

    public function getLastClassBelongStudent($student_id){
        return DB::table('classes')
            ->select('classes.id as class_id')
            ->join('belong_classes', 'classes.id', '=', 'belong_classes.class_id')
            ->join('students', 'belong_classes.student_id', '=', 'students.id')
            ->join('semesters', 'classes.semester_id', '=', 'semesters.id')
            ->where('students.id', $student_id)
            ->orderBy('semesters.year', 'desc')
            ->orderBy('semesters.isEarlyPeriod', 'asc')
            ->first()
            ->class_id;
    }

    // 生徒が所属しているクラス一覧
    public function getClassesBelongStudent($student_id){
        return DB::table('classes')
            ->select('classes.id as class_id')
            ->join('belong_classes', 'classes.id', '=', 'belong_classes.class_id')
            ->join('students', 'belong_classes.student_id', '=', 'students.id')
            ->join('semesters', 'classes.semester_id', '=', 'semesters.id')
            ->where('students.id', $student_id)
            ->orderBy('semesters.year', 'desc')
            ->orderBy('semesters.isEarlyPeriod', 'asc')
            ->get();
    }
}
