<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Classes;
use App\Models\Semester;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //教師コントローラー

    public function show_announcements_at_teacher($class_id){
        $class = Classes::find($class_id);
        $announcement_model = new Announcement();
        $announcements = $announcement_model->getAnnouncements($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        return view('teacher.announcement.show_announcements')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'announcements' => $announcements,
        ]);
    }

    public function create($class_id){
        $class = Classes::find($class_id);
        $semester_model = new Semester();
        $semester_name = $semester_model->getSentenceOnClass($class_id);
        return view('teacher.announcement.create_announcement')->with([
            'class' => $class,
            'semester_name' => $semester_name,
        ]);
    }

    public function store($class_id, Request $request){
        $class = Classes::find($class_id);
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
        return view('teacher.announcement.edit_announcement')->with([
            'class' => $class,
            'semester_name' => $semester_name,
            'announcement' => $announcement,
        ]);
    }

    public function update($class_id, $announcement_id, Request $request){
        $announcement = Announcement::find($announcement_id);
        $request->validate([
            'title' => 'required|max:31',
            'content' => 'required|max:511'
        ]);
        $announcement->title = $request->title;
        $announcement->content = $request->content;
        $announcement->save();
        return redirect()->route('announcement.edit', ['class_id' => $class_id, 'announcement_id' => $announcement_id]);
    }

    public function destroy($class_id, $announcement_id){
        $announcement = Announcement::find($announcement_id);
        $announcement->delete();
        return redirect()->route('announcement.show_at_teacher', $class_id);
    }


    //生徒コントローラー

    public function show_announcements_at_student($class_id){}

    //お知らせの詳細
    public function show_announcement($class_id, $announcement_id){}
}
