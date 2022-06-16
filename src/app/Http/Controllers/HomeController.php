<?php

namespace App\Http\Controllers;

use App\Models\Administrator;
use App\Models\Classes;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }

    public function admin(){
        return view('admin.home');
    }

    public function teacher(){
        $semester_model = new Semester();
        $last_semester = $semester_model->getLastSemester();
        return view('teacher.home')->with(['semester_id' => $last_semester->id]);
    }

    public function student(){
        $student = Auth::user();
        $class_model = new Classes();
        $last_class_id = $class_model->getLastClassBelongStudent($student->id);
        return view('student.home')->with(['class_id' => $last_class_id]);
    }
}
