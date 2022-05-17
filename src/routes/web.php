<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//管理者ログインのルーティング
Route::get('/kbc_administrator/login', [LoginController::class, 'adminLoginForm'])->name('admin.login');
Route::post('/kbc_administrator/authenticate', [LoginController::class, 'adminAuthentication'])->name('admin.authenticate');
//教師ログインのルーティング
Route::get('/kbc_teacher/login', [LoginController::class, 'teacherLoginForm'])->name('teacher.login');
Route::post('/kbc_teacher/authenticate', [LoginController::class, 'teacherAuthentication'])->name('teacher.authenticate');
//生徒ログインのルーティング
Route::get('/kbc_student/login', [LoginController::class, 'studentLoginForm'])->name('student.login');
Route::post('/kbc_student/authenticate', [LoginController::class, 'studentAuthentication'])->name('student.authenticate');

//管理者のルーティング
Route::prefix('/kbc_administrator/semester')->middleware('auth:admin')->group(function(){
    Route::get('/', [SemesterController::class, 'select_at_admin'])->name('semester.select_at_admin');
    Route::get('/create', [SemesterController::class, 'create'])->name('semester.create');
    Route::post('/store', [SemesterController::class, 'store'])->name('semester.store');
    Route::get('/{semester_id}', [SemesterController::class, 'show_at_admin'])->name('semester.show_at_admin');
    Route::get('/{semester_id}/edit', [SemesterController::class, 'edit'])->name('semester.edit');
    Route::put('/{semester_id}/update', [SemesterController::class, 'update'])->name('semester.update');
    Route::delete('/{semester_id}/destroy', [SemesterController::class, 'destroy'])->name('semester.destroy');
    Route::get('/{semester_id}/class/create', [ClassesController::class, 'create'])->name('class.create');
    Route::post('/{semester_id}/class/store', [ClassesController::class, 'store'])->name('class.store');
    Route::post('/{semester_id}/class/{class_id}/destroy', [ClassesController::class, 'destroy'])->name('class.destroy');
});

Route::prefix('/kbc_administrator/teachers')->middleware('auth:admin')->group(function(){
    Route::get('/', [TeacherController::class, 'manage_teachers'])->name('teacher.manage');
    Route::get('/register', [TeacherController::class, 'register'])->name('teacher.register');
    Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');
    Route::delete('/{teacher_id}/destroy', [TeacherController::class, 'destroy'])->name('teacher.destroy');
});


//教師のルーティング
Route::prefix('/kbc_teacher/class')->middleware('auth:teacher')->group(function(){
    Route::get('/{class_id}', [ClassesController::class, 'show_at_teacher'])->name('class.show_at_teacher');
    //カリキュラムの編集など
    Route::get('/{class_id}/edit', [ClassesController::class, 'edit'])->name('class.edit');
    //クラス名の更新
    Route::put('/{class_id}/update', [ClassesController::class, 'update'])->name('class.update');

});

Route::prefix('/kbc_teacher/class/{class_id}/curriculum')->middleware('auth:teacher')->group(function(){
    //カリキュラム（１コマ）の追加
    Route::post('/store', [CurriculumController::class, 'store'])->name('curriculum.store');
    //カリキュラム（１コマ）の更新
    Route::put('/{curriculum_id}/update', [CurriculumController::class, 'update'])->name('curriculum.update');
    //カリキュラム（１コマ）の削除
    Route::delete('/curriculum_id/destroy', [CurriculumController::class, 'destroy'])->name('curriculum.destroy');

});

Route::prefix('/kbc_teacher/class/{class_id}/lesson')->middleware('auth:teacher')->group(function(){
    //授業
    Route::get('/', [LessonController::class, 'show_lessons_at_teacher'])->name('class.show_lessons');
    Route::get('/create', [LessonController::class, 'create'])->name('lesson.create');
    Route::post('/store', [LessonController::class, 'store'])->name('lesson.store');
    Route::get('/{lesson_id}', [LessonController::class, 'edit'])->name('lesson.edit');
    Route::put('/{lesson_id}/update', [LessonController::class, 'update'])->name('lesson.update');

});

Route::prefix('/kbc_teacher/class/{class_id}/announcement')->middleware('auth:teacher')->group(function(){
    //お知らせ
    Route::get('/', [AnnouncementController::class, 'show_announcements_at_teacher'])->name('announcement.show_at_teacher');
    Route::get('/create', [AnnouncementController::class, 'create'])->name('announcement.create');
    Route::post('/store', [AnnouncementController::class, 'store'])->name('announcement.store');
    Route::get('/{announcement_id}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
    Route::put('/{announcement_id}/update', [AnnouncementController::class, 'update'])->name('announcement.update');
    Route::delete('/{announcement_id}/destroy', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');
});

Route::prefix('/kbc_teacher/class/{class_id}/schedule')->middleware('auth:teacher')->group(function(){
    //スケジュール
    Route::get('/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/store', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::put('/{schedule_id}/update', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::delete('/{schedule_id}/destroy', [ScheduleController::class, 'destroy'])->name('schedule.destroy');
});

Route::prefix('/kbc_teacher/class/{class_id}/student')->middleware('auth:teacher')->group(function(){
    //生徒アカウントの作成
    Route::get('/create_account', [StudentController::class, 'create_account'])->name('student.create_account');
    Route::post('/store_account', [StudentController::class, 'store_account'])->name('student.create_account');
    //生徒をクラスに追加
    Route::get('/add_students', [ClassesController::class, 'add_students'])->name('class.add_students');
    Route::post('/store_add_students', [ClassesController::class, 'store_add_students'])->name('class.store_add_students');
    Route::delete('/leave_students', [ClassesController::class, 'leave_students'])->name('class.leave_students');
});

Route::prefix('/kbc_teacher')->middleware('auth:teacher')->group(function(){
    //年度の切り替え
    Route::get('/select_semester', [SemesterController::class, 'select_at_teacher'])->name('semester.select_at_teacher');
    //クラスの選択
    Route::get('/semester/{$semester_id}/select_class', [ClassesController::class, 'select_class'])->name('class.select');

    Route::get('/profile', [TeacherController::class, 'edit_profile'])->name('teacher.edit_profile');
    Route::put('/profile/update', [TeacherController::class, 'update_profile'])->name('teacher.update_profile');
    Route::get('/password', [TeacherController::class, 'edit_password'])->name('teacher.edit_password');
    Route::put('/password/update', [TeacherController::class, 'update_password'])->name('teacher.update_password');
});


//生徒のルーティング
Route::prefix('/kbc_student/class/{class_id}')->middleware('auth:student')->group(function(){
    Route::get('/', [ClassesController::class, 'show_at_student'])->name('class.show_at_student');
    Route::get('/lesson/{lesson_id}', [LessonController::class, 'show_lesson'])->name('lesson.show');
    Route::get('/students', [StudentController::class, 'show_students_in_class'])->name('student.show_students');
    Route::get('/teachers', [TeacherController::class, 'show_teachers'])->name('teacher.show_teachers');
    Route::get('/announcement', [AnnouncementController::class, 'show_announcements_at_student'])->name('announcement.show_announcements_at_student');
    Route::get('/announcement/{announcement_id}', [AnnouncementController::class, 'show_announcement'])->name('announcement.show_announcement');
});

Route::prefix('/kbc_student')->middleware('auth:student')->group(function(){
    Route::get('/select_semester', [SemesterController::class, 'select_at_student'])->name('semester.select_at_student');
    Route::get('/profile', [StudentController::class, 'edit_profile'])->name('student.edit_profile');
    Route::put('/profile/update', [StudentController::class, 'update_profile'])->name('student.update_profile');
    Route::get('/password', [StudentController::class, 'edit_password'])->name('student.edit_password');
    Route::put('/password/update', [StudentController::class, 'update_password'])->name('student.update_password');
});