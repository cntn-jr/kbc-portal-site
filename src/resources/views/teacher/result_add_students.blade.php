@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white my-3 py-3">
            <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
            <h3 class="text-center mb-5">{{ $class->name }}</h3>
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
        </div>
    </div>
</div>
@endsection