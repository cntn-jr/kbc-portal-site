<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Curriculum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rule;

class CurriculumController extends Controller
{
    //１コマ追加処理
    public function store($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'lesson_id' => [
                'integer',
                Rule::unique('curriculums')
                    ->where('class_id', $class_id)
                    ->where('dayOfTheWeek', $request->dayOfTheWeek)
                    ->where('period', $request->period)
            ],
            'dayOfTheWeek' => [
                'regex:/^[0-4]$/'
            ],
            'period' => [
                'regex:/^[1-4]$/'
            ]
        ]);
        Curriculum::create([
            'lesson_id' => $request->lesson_id,
            'dayOfTheWeek' => $request->dayOfTheWeek,
            'period' => $request->period,
            'class_id' => $class_id,
        ]);
        if($request->redirectFrom == 'show_class')
            return redirect()->route('class.show_at_teacher', $class_id);
        return redirect()->route('class.edit', $class_id);
    }

    //１コマ編集処理
    public function update($class_id, $curriculum_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'lesson_id' => 'integer'
        ]);
        $curriculum = Curriculum::find($curriculum_id);
        $curriculum->lesson_id = $request->lesson_id;
        $curriculum->save();
        if($request->redirectFrom == 'show_class')
            return redirect()->route('class.show_at_teacher', $class_id);
        return redirect()->route('class.edit', $class_id);
    }

    //１コマ削除処理
    public function destroy($class_id, $curriculum_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $curriculum = Curriculum::find($curriculum_id);
        $curriculum->delete();
        if($request->redirectFrom == 'show_class')
            return redirect()->route('class.show_at_teacher', $class_id);
        return redirect()->route('class.edit', $class_id);
    }
}
