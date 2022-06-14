@extends('layouts.teacher_class')

@section('class_content')
                <a class="btn btn-outline-secondary mb-3" href="{{ route('class.edit', $class->id) }}" role="button">編集モード</a>
                <a class="btn btn-outline-secondary mb-3" href="{{ route('announcement.show_at_teacher', $class->id) }}" role="button">お知らせ一覧</a>
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
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.add_students', $class->id) }}" role="button">生徒をクラスに追加</a>
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.show_students', $class->id) }}" role="button">生徒一覧</a>
            </div>
        </div>
    </div>
</div>
@endsection