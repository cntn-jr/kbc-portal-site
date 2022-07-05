@extends('layouts.teacher_class')

@section('class_content')
    <h5 class="text-center my-4">クラスに所属している生徒</h5>
    <a class="btn btn-outline-secondary mb-3" href="{{ route('student.create_account', $class->id) }}" role="button">生徒アカウント作成</a>
    <a class="btn btn-outline-secondary mb-3" href="{{ route('class.add_students', $class->id) }}" role="button">生徒をクラスに追加</a>
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
@endsection