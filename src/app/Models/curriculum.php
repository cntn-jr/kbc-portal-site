<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    public function getCurriculum($class_id){
        $curriculum_week = [
            [1=>'', 2=>'', 3=>'', 4=>''],//月曜日
            [1=>'', 2=>'', 3=>'', 4=>''],//火曜日
            [1=>'', 2=>'', 3=>'', 4=>''],//水曜日
            [1=>'', 2=>'', 3=>'', 4=>''],//木曜日
            [1=>'', 2=>'', 3=>'', 4=>''],//金曜日
        ];
        $lessons_class = DB::table('lessons')
            ->select('lessons.name', 'lessons.outline', 'curriculums.dayOfTheWeek', 'curriculums.period', 'teachers.name', 'teachers.email')
            ->join('curriculums', 'curriculums.lesson_id', '=', 'lessons.id')
            ->join('teachers', 'teachers.id', '=', 'lessons.teacher_id')
            ->where('lessons.class_id', $class_id)
            ->get();
        foreach ($lessons_class as $lesson) {
            //$curriculum_week[曜日][割当時間]
            $curriculum_week[$lesson->dayOfTheWeek][$lesson->period] = $lesson;
        }
        return $curriculum_week;
    }
}
