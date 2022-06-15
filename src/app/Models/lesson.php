<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    protected $fillable = ['name', 'outline', 'teacher_id', 'class_id'];

    //その授業の担当の教師の情報
    public function getTacherInCharge(){
        $lesson = Lesson::find($this->id);
        $teacher = Teacher::find($lesson->teacher_id);
        return $teacher;
    }

    public function getLessons($class_id){
        return DB::table('lessons')
            ->select('lessons.id as lesson_id', 'lessons.name as lesson_name', 'lessons.outline', 'teachers.name as teacher_name', 'teachers.email', 'teachers.id as teacher_id')
            ->join('teachers', 'teachers.id', '=', 'lessons.teacher_id')
            ->where('lessons.class_id', $class_id)
            ->get();
    }

    public function getLesson($lesson_id){
        return DB::table('lessons')
            ->select('lessons.id as lesson_id', 'lessons.name as lesson_name', 'lessons.outline', 'teachers.name as teacher_name', 'teachers.email', 'teachers.id as teacher_id')
            ->join('teachers', 'teachers.id', '=', 'lessons.teacher_id')
            ->where('lessons.id', $lesson_id)
            ->first();
    }

}
