<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Semester extends Model
{
    use HasFactory;

    protected $table = 'semesters';

    protected $fillable = ['year', 'isEarlyPeriod'];

    public function getSemestersPage4(){
        return $this->orderBy('year', 'desc')
            ->orderBy('isEarlyPeriod', 'asc')
            ->paginate(4);
    }

    public function getSemesters(){
        return $this->orderBy('year', 'desc')
            ->orderBy('isEarlyPeriod', 'asc')
            ->get();
    }

    public function getSentence(){
        if ($this->isEarlyPeriod)
            return $this->year.'年度'.' '.'前期';
        else
            return $this->year.'年度'.' '.'後期';
    }

    public function getSentenceOnClass($class_id){
        $class = Classes::find($class_id);
        $semester = Semester::find($class->semester_id);
        return $semester->getSentence();
    }

    //最新の学期を返す
    public function getLastSemester(){
        return Semester::orderBy('year', 'desc')
            ->orderBy('isEarlyPeriod', 'asc')
            ->first();
    }

    public function semestersBelongTeacher($teacher_id){
        return DB::table('semesters')
            ->select('semesters.id')
            ->join('classes', 'classes.semester_id', '=', 'semesters.id')
            ->where('classes.teacher_id', $teacher_id)
            ->orderBy('semesters.year', 'desc')
            ->orderBy('semesters.isEarlyPeriod', 'asc')
            ->get();
    }

}
