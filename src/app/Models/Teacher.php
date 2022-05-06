<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;

    protected $guard = 'teacher';

    protected $table = 'teachers';

    const MODEL_TYPE = 'teacher';

    public function getModelType(){
        return '教師';
    }

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
