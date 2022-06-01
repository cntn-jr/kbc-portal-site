@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
                <h3 class="text-center mb-3">{{ $class->name }}</h3>
                <a class="btn btn-outline-secondary mb-3" href="{{ route('class.edit', $class->id) }}" role="button">編集モード</a>
                <div class="d-flex flex-row">
                    @foreach($curriculum as $curriculum_week)
                        <div class="justify-content-center">
                            <div class="card text-center" style="width: 10rem; height: 3rem;">
                                <h4 class="my-auto">{{ $dayOfTheWeeks[$loop->index] }}</h4>
                            </div>
                            @foreach($curriculum_week as $lesson)
                                <div class="card" style="width: 10rem; height: 10rem;">
                                    <div class="card-body">
                                        @if($lesson)
                                            <h5 class="card-title mt-2 text-center" style="height: 4rem;">
                                                {{ $lesson->lesson_name }}
                                            </h5>
                                            <div class="card-text text-center" style="height: 3rem;">{{ $lesson->teacher_name }}</div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.show_lessons', $class->id) }}" role="button">授業一覧</a>
                <a class="btn btn-outline-secondary my-3" href="{{ route('student.create_account', $class->id) }}" role="button">生徒登録</a>
            </div>
        </div>
    </div>
</div>
@endsection