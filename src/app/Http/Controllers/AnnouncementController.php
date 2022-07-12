<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Classes;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    //教師コントローラー

    public function show_announcements_at_teacher($class_id){
        $class = Classes::find($class_id);
        $announcement_model = new Announcement();
        $announcements = $announcement_model->getAnnouncements($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $login_user = Auth::user();
        // 担任以外の教師は削除ボタンを表示しない
        if(!$class->isResponsibleClass($login_user->id))
            return view('teacher.common.show_announcements')->with([
                'class' => $class,
                'semester_name' => $semester_name,
                'announcements' => $announcements,
            ]);
        else
            return view('teacher.announcement.show_announcements')->with([
                'class' => $class,
                'semester_name' => $semester_name,
                'announcements' => $announcements,
            ]);
    }

    public function create($class_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        return view('teacher.announcement.create_announcement')->with([
            'class' => $class,
            'semester_name' => $semester_name,
        ]);
    }

    public function store($class_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $request->validate([
            'title' => 'required|max:31',
            'content' => 'required|max:511'
        ]);
        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
            'class_id' => $class_id
        ]);
        return redirect()->route('announcement.show_at_teacher', $class_id);
    }

    public function edit($class_id, $announcement_id){
        $class = Classes::find($class_id);
        $announcement = Announcement::find($announcement_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        $login_user = Auth::user();
        // 担任以外の教師は編集させない
        if(!$class->isResponsibleClass($login_user->id))
            return view('teacher.common.detail_announcement')->with([
                'class' => $class,
                'semester_name' => $semester_name,
                'announcement' => $announcement,
            ]);
        else
            return view('teacher.announcement.edit_announcement')->with([
                'class' => $class,
                'semester_name' => $semester_name,
                'announcement' => $announcement,
            ]);
    }

    public function update($class_id, $announcement_id, Request $request){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $announcement = Announcement::find($announcement_id);
        $request->validate([
            'title' => 'required|max:31',
            'content' => 'required|max:511'
        ]);
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->save();
        return redirect()->route('announcement.show_at_teacher', $class_id);
    }

    public function destroy($class_id, $announcement_id){
        $login_user = Auth::user();
        $class = Classes::find($class_id);
        // 担任以外の教師はホームにリダイレクトさせる
        if(!$class->isResponsibleClass($login_user->id))
            return redirect()->route('teacher.home');
        $announcement = Announcement::find($announcement_id);
        $announcement->delete();
        return redirect()->route('announcement.show_at_teacher', $class_id);
    }


    //生徒コントローラー

    public function show_announcements_at_student($class_id){
        $class = Classes::find($class_id);
        $announcement_model = new Announcement();
        $announcements = $announcement_model->getAnnouncements($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        return view('student.show_announcements')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'announcements' => $announcements,
        ]);
    }

    //お知らせの詳細
    public function show_announcement($class_id, $announcement_id){
        $class = Classes::find($class_id);
        $announcement = Announcement::find($announcement_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        return view('student.detail_announcement')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'announcement' => $announcement,
        ]);
    }
}
