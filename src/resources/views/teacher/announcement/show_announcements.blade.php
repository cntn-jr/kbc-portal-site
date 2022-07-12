@extends('layouts.teacher_class')

@section('class_content')
    <announcements-component :is_teacher="1" :announcements="{{ json_encode($announcements) }}" :csrf="{{json_encode(csrf_token())}}" :class_id="{{ $class->id }}"></announcements-component>
@endsection
