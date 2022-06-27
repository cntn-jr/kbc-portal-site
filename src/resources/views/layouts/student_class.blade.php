@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
        <h3 class="text-center mb-3">{{ $class->name }}</h3>
        <div class="col-md-10 d-flex flex-row bg-white my-3">
            <div class="col-3 text-center my-3">
                <a class="text-secondary" href="{{ route('class.show_at_student', $class->id) }}">
                    クラス画面
                </a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-3 text-center my-3">
                <a class="text-secondary" href="{{ route('announcement.show_at_student', $class->id) }}">お知らせ一覧</a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-3 text-center my-3">
                <a class="text-secondary" href="{{ route('student.show_students', $class->id) }}">生徒一覧</a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-3 text-center my-3">
                <a class="text-secondary" href="{{ route('teacher.show_teachers') }}">教師一覧</a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container">
                @yield('class_content')
            </div>
        </div>
    </div>
</div>
@endsection