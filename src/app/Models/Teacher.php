<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    public function isTeacher(){
        return true;
    }

    public function getListOfTeachers(){
        return Teacher::all();
    }

    public function getTeacher($teacher_id){
        return Teacher::find($teacher_id);
    }
}
