@extends('layouts.student_base')

@section('student_content')
    @foreach($students as $student_group)
        <div class="d-flex flex-row justify-content-center">
            @foreach($student_group as $student)
                <div class="card m-1" style="width: 15rem; height: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title mt-3 text-center">
                            {{ $student->name }}
                        </h5>
                        <div class="card-text text-center mt-4">{{ $student->email }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection