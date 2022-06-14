@extends('layouts.teacher_class')

@section('class_content')
            <h3 class="text-center mb-5">クラスに所属している生徒</h3>
            @foreach($students as $student)
                <form method="POST" action="{{route('class.leave_student', ['class_id' => $class->id, 'student_id' => $student->student_id])}}">
                    <div class="form-group row bg-white py-3 m-0 border">
                        <div class="col-9 text-center row">
                            <div class="col-5 text-center">
                            {{ $student->name }}
                            </div>
                            <div class="col-7 text-left">
                            {{$student->email}}
                            </div>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-outline-danger btn-sm">除外</button>
                        </div>
                        @method('delete')
                        @csrf
                    </div>
                </form>
            @endforeach
            <div class="form-group my-3">
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.show_at_teacher', $class->id) }}" role="button">クラス画面へ</a>
            </div>
        </div>
    </div>
</div>
@endsection