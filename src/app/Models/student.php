<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

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
