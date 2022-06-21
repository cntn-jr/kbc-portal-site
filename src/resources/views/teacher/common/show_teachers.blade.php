@extends('layouts.student_base')

@section('student_content')
    @foreach($teachers as $teacher_group)
        <div class="d-flex flex-row justify-content-center">
            @foreach($teacher_group as $teacher)
                <div class="card m-1" style="width: 15rem; height: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title mt-3 text-center">
                            {{ $teacher->name }}
                        </h5>
                        <div class="card-text text-center mt-4">{{ $teacher->email }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection