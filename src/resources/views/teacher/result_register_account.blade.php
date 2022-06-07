@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white my-3 py-3">
            <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
            <h3 class="text-center mb-5">{{ $class->name }}</h3>
            <h3 class="text-center mb-5">アカウント作成した生徒</h3>
            <form action="{{ route('class.store_add_students', $class->id) }}" method="POST">
                <ul class="list-group">
                    @foreach($students as $student)
                        <li class="list-group-item">
                            <input type="checkbox" class="form-check-input" id="student{{$loop->index}}" name="student_id{{$loop->index}}" value="{{$student->id}}" checked>
                            <label class="form-check-label" for="student{{$loop->index}}">
                                {{ $student->name }}{{ __('　') }}{{$student->email}}
                            </label>
                        </li>
                    @endforeach
                </ul>
                <div class="form-group my-3">
                    <button type="submit" class="btn btn-secondary">このクラスに追加する</button>
                </div>
                @csrf
            </form>
            <div class="form-group my-3">
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.show_at_teacher', $class->id) }}" role="button">クラス画面へ</a>
            </div>
        </div>
    </div>
</div>
@endsection