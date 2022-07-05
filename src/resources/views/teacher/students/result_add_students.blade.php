@extends('layouts.teacher_class')

@section('class_content')

    <h3 class="text-center mb-5">クラスに追加した生徒</h3>
    <ul class="list-group">
        @foreach($students as $student)
            <li class="list-group-item text-center">
                {{ $student->name }}{{ __('　') }}{{$student->email}}
            </li>
        @endforeach
    </ul>
    <div class="form-group my-3">
        <a class="btn btn-outline-secondary my-3" href="{{ route('class.show_at_teacher', $class->id) }}" role="button">確認</a>
    </div>

@endsection