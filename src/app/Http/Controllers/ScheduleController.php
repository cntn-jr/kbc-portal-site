<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    //教師コントローラ

    public function store($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'schedule_date' => ['required', 'date'],
            'detail' => ['required', 'max:63']
        ]);
        Schedule::create([
            'scheduledDate' => $request->schedule_date,
            'detail' => $request->detail,
            'class_id' => $class_id,
        ]);
        return redirect()->route('class.show_at_teacher', $class_id);
    }

    public function update($class_id, $schedule_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'scheduledDate' => ['required', 'date'],
            'detail' => ['required', 'max:63']
        ]);
        $schedule = Schedule::find($schedule_id);
        $schedule->scheduledDate = $request->scheduledDate;
        $schedule->detail = $request->detail;
        $schedule->save();
        return redirect()->route('class.show_at_teacher', $class_id);
    }

    public function destroy($class_id, $schedule_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $schedule = Schedule::find($schedule_id);
        $schedule->delete();
        return redirect()->route('class.show_at_teacher', $class_id);
    }


    //生徒コントローラー
}
