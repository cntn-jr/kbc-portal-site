<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    //その授業の担当の教師の情報
    public function getTacherInCharge(){
        $lesson = Lesson::find($this->id);
        $teacher = Teacher::find($lesson->teacher_id);
        return $teacher;
    }

    public function getLessons($class_id){
        DB::table('lessons')
            ->select('name', 'outline', 'teacher_id')
            ->join('curriculums', 'curriculums.lesson_id', '=', 'lessons.id')
            ->where('curriculums.class_id', $class_id)
            ->get();
    }

}
