@extends('layouts.teacher_common_class')

@section('class_content')
    <h6 class="text-center">授業詳細</h6>
    <div class="justify-content-center mt-4 p-3">
        <div class="col-md-8 container">
            <div class="container bg-white border p-4 text-center">
                <h5>{{ $lesson->lesson_name }}</h5>
                <div class="my-3">
                    {{ $lesson->teacher_name }}
                </div>
                <div class="my-3">
                    {{ $lesson->email }}
                </div>
                <div class="my-3">
                    {{ $lesson->outline }}
                </div>
            </div>
        </div>
    </div>
@endsection