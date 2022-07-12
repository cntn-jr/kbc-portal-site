@extends('layouts.teacher_common_class_home')

@section('class_content')

    <div class="d-flex justify-content-between">
        <last-announcement :is_teacher="0" :announcements="{{ json_encode($announcements) }}" :csrf="{{json_encode(csrf_token())}}" :class_id="{{ $class->id }}"></last-announcement>
        <calendar-component :is_teacher="0" csrf="a" redirect_pass="a" :schedules="{{ json_encode($schedules) }}" class_id="a"></calendar-component>
    </div>
    <div class="d-flex flex-row my-3 justify-content-center">
        @foreach($curriculum as $curriculum_week)
            <div class="justify-content-center">
                <div class="card text-center" style="width: 10rem; height: 3rem;">
                    <h4 class="my-auto">{{ $dayOfTheWeeks[$loop->index] }}</h4>
                </div>
                @foreach($curriculum_week as $lesson)
                    @if($lesson)
                    <a href="{{ route('lesson.edit', ['class_id' => $class->id, 'lesson_id' => $lesson->lesson_id]) }}" class="text-reset" style="text-decoration: none;">
                        <div class="card" style="width: 10rem; height: 10rem;">
                            <div class="card-body">
                                <h5 class="card-title mt-2 text-center" style="height: 4rem;">
                                    {{ $lesson->lesson_name }}
                                </h5>
                                <div class="card-text text-center" style="height: 3rem;">{{ $lesson->teacher_name }}</div>
                            </div>
                        </div>
                    </a>
                    @endif
                @endforeach
            </div>
        @endforeach
    </div>
@endsection