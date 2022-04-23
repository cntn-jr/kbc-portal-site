<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    public function isTeacher(){
        return false;
    }

    public function getListOfStudents(){
        return Student::all();
    }

    public function getStudent($student_id){
        return Student::find($student_id);
    }
}
