@extends('layouts.teacher_class_home')

@section('class_content')
    <div class="d-flex justify-content-between">
        <last-announcement :is_teacher="1" :announcements="{{ json_encode($announcements) }}" :csrf="{{json_encode(csrf_token())}}" :class_id="{{ $class->id }}"></last-announcement>
        <calendar-component :is_teacher="1" :csrf="{{json_encode(csrf_token())}}" :redirect_pass="{{ json_encode(route('schedule.store', $class->id)) }}" :schedules="{{ json_encode($schedules) }}" :class_id="{{ $class->id }}"></calendar-component>
    </div>
    <curriculum-component :csrf="{{json_encode(csrf_token())}}" :curriculum="{{json_encode($curriculum)}}" curriculum_store_url="{{route('curriculum.store', $class->id)}}" :class_lessons="{{json_encode($class_lessons)}}" :class_id="{{$class->id}}" />
@endsection