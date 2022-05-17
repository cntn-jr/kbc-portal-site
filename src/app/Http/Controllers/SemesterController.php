<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Semester;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    //管理者コントローラー

    public function select_at_admin(){
        $semester = new Semester();
        $semesters = $semester->getSemesters();
        return view('admin.select_semester')->with('semesters', $semesters);
    }

    public function show_at_admin($semester_id){
        $class = new Classes();
        $classes = $class->getClasses($semester_id);
        $semester = Semester::find($semester_id);
        $semester_name = $semester->getSentence();
        return view('admin.show_semester')->with(['classes' => $classes, 'semester_name' => $semester_name, 'semester_id' => $semester_id]);
    }

    public function create(){
        $now = Carbon::now();
        $now_year = $now->year;
        $years = [];
        for ($i=-1; $i < 4; $i++) {
            array_push($years, $now_year + $i);
        }
        return view('admin.create_semester')->with([
            'years' => $years,
            'now_year' => $now_year
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'year' => 'required|digits:4',
            'isEarlyPeriod' => ['required', 'boolean',
                Rule::unique('semesters')->where('year', $request->year)
            ]
        ]);
        $semester = Semester::create([
            'year' => $request->year,
            'isEarlyPeriod' => $request->isEarlyPeriod,
        ]);
        $semester->save();
        return redirect()->route('semester.select_at_admin');
    }

    public function edit($semester_id){}

    public function update($semester_id){}

    public function destroy($semester_id){}


    //教師コントローラー

    public function select_at_teacher(){
        return view('teacher.select_semester');
    }

    public function show_at_teacher(){}


    //生徒コントローラー

    public function select_at_student(){
        return view('student.select_semester');

    }

    public function show_at_student(){}
}
