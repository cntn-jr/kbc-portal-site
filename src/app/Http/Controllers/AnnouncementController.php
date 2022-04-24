<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    //教師コントローラー

    public function show_announcements_at_teacher($class_id){}

    public function create($class_id){}

    public function store($class_id){}

    public function edit($class_id, $announcement_id){}

    public function update($class_id, $announcement_id){}

    public function destroy($class_id, $announcement_id){}


    //生徒コントローラー

    public function show_announcements_at_student($class_id){}

    //お知らせの詳細
    public function show_announcement($class_id, $announcement_id){}
}
