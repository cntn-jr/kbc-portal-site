@extends('layouts.student_base')

@section('student_content')
    <h5 class="text-center">プロフィール編集</h5>
    <form action="{{ route('student.update_profile') }}" method="POST">
        <div class="form-group my-3 col-8 mx-auto">
            <label for="name">名前</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}" required>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="attend_num">名前</label>
            <input type="text" class="form-control" id="name" name="attend_num" value="{{ $student->attend_num }}" required>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="email">メールアドレス</label>
            <input type="text" class="form-control" id="email" name="email" value="{{ $student->email }}" required>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <button type="submit" class="btn btn-secondary">更新</button>
        </div>
        @method('put')
        @csrf
    </form>
@endsection