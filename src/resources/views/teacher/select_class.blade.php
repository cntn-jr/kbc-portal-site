@extends('layouts.teacher_base')

@section('teacher_content')
    <h3 class="text-center mt-4 mb-5">{{$semester_name}}</h3>
    @foreach($classes as $class_group)
        <div class="d-flex flex-row justify-content-center">
            @foreach($class_group as $class)
                <a href="{{ route('class.show_at_teacher', $class->class_id) }}" class="text-reset" style="text-decoration: none;">
                    <div class="card m-1" style="width: 15rem; height: 10rem;">
                        <div class="card-body">
                            <h5 class="card-title mt-2 text-center">
                                {{$class->class_name}}
                            </h5>
                            <div class="card-text text-center">{{$class->teacher_name}}</div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endforeach

@endsection