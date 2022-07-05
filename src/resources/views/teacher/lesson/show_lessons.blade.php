@extends('layouts.teacher_class')

@section('class_content')
    <h5 class="text-center my-3">授業一覧</h5>
    <a class="btn btn-outline-secondary my-3" href="{{ route('lesson.create', $class->id) }}" role="button">授業作成</a>
    @foreach($lessons as $lesson_ary)
        <div class="d-flex flex-row justify-content-center">
            @foreach($lesson_ary as $lesson)
                <a href="{{ route('lesson.edit', [
                    'class_id' => $class->id,
                    'lesson_id' => $lesson->lesson_id
                ]) }}" class="text-reset" style="text-decoration: none;">
                    <div class="card" style="width: 15rem; height: 15rem;">
                        <div class="card-body">
                            @if($lesson)
                                <h5 class="card-title mt-2 text-center" style="height: 3rem;">
                                    {{ $lesson->lesson_name }}
                                </h5>
                                <div class="card-text text-center" style="height: 2rem;">
                                    {{ $lesson->teacher_name }}
                                </div>
                                <div class="card-text text-center text-break" style="height: 10rem;">
                                    {{ $lesson->outline }}
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @endforeach
@endsection