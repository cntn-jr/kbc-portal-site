@extends('layouts.teacher_class')

@section('class_content')
    <form action="{{ route('class.add_students', $class->id) }}" method="GET">
        <div class="form-group my-3">
            <input type="text" name="search_param" id="" class="form-control" value="@if($search_param) {{$search_param}} @endif" placeholder="メールアドレス検索">
        </div>
        <div class="form-group my-3">
            <button type="submit" class="btn btn-outline-secondary">検索</button>
        </div>
    </form>
    @if($students)
        <form action="{{ route('class.store_add_students', $class->id) }}" method="POST">
            <small id="addHelp" class="form-text text-muted">既に追加されている生徒についてはチェックをつけてもクラス追加されることはありません</small>
                @foreach($students as $student)
                <div class="form-group row bg-white py-3 m-0 border">
                    <div class="col-1 text-center">
                        <input type="checkbox" class="form-check-input" id="student{{$loop->index}}" name="student_id{{$loop->index}}" value="{{$student->id}}" checked>
                    </div>
                    <div class="col-11">
                        <label class="form-check-label" for="student{{$loop->index}}">
                            {{ $student->name }}{{ __('　') }}{{ $student->email }}
                        </label>
                    </div>
                </div>
                @endforeach
            <div class="form-group my-3">
                <button type="submit" class="btn btn-secondary">追加</button>
            </div>
            @csrf
        </form>
    @endif
@endsection