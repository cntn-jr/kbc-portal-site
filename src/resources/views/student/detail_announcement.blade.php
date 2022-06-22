@extends('layouts.student_class')

@section('class_content')
    <h6 class="text-center">お知らせ</h6>
    <div class="justify-content-center  mt-4 p-3">
        <div class="col-md-8 container">
            <div class="container bg-white p-4 border">
                <h5 class="p-2">{{ $announcement->title }}</h5>
                <div class="px-4 py-2">
                    {{ $announcement->content }}
                </div>
            </div>
        </div>
    </div>
@endsection