@extends('layouts.teacher_common_class_home')

@section('class_content')

    <div class="d-flex justify-content-between">
        <last-announcement :is_teacher="0" :announcements="{{ json_encode($announcements) }}" :csrf="{{json_encode(csrf_token())}}" :class_id="{{ $class->id }}"></last-announcement>
        <calendar-component :is_teacher="0" csrf="a" redirect_pass="a" :schedules="{{ json_encode($schedules) }}" class_id="a"></calendar-component>
    </div>
    <curriculum-component :curriculum="{{json_encode($curriculum)}}" :is_class_teacher="0" />
@endsection