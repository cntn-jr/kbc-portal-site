<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class Student extends Authenticatable
{
    use HasFactory;

    protected $guard = 'student';

    protected $table = 'students';

    protected $fillable = ['name', 'email', 'attend_num', 'password'];

    const MODEL_TYPE = 'student';

    public function getModelType(){
        return '生徒';
    }

    public function isTeacher(){
        return false;
    }

    public function getListOfStudents(){
        return Student::all();
    }

    public function getStudent($student_id){
        return Student::find($student_id);
    }

    public function getStudentsOnClass($class_id){
        return DB::table('students')
            ->select('students.id as student_id', 'name', 'email', 'attend_num')
            ->join('belong_classes', 'belong_classes.student_id', '=', 'students.id')
            ->where('class_id', $class_id)
            ->get();
    }

    public function validateStudents($students){
        foreach($students as $sutdent){
            // 出席番号を数値にキャストする
            $sutdent[0] = (integer)$sutdent[0];
            $validator = Validator::make($sutdent, [
                '0' => 'required|regex:/^[0-9]+$/',
                '1' => 'max:31|required',
                '2' => 'unique:students,email|email|required'
            ]);
            if($validator->fails())
                return false;
        }
        return true;
    }

    public function createDefaultPassword($email){
        // メールアドレスの＠より前を切り出す
        $email = mb_split("@", $email)[0];
        $plain_password = 'password_'.$email;
        return Hash::make($plain_password);
    }
}
