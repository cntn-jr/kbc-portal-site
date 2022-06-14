@extends('layouts.teacher_base')

@section('teacher_content')
    <h5 class="text-center">パスワード編集</h5>
    <form action="{{ route('teacher.update_password') }}" method="POST">
        <div class="form-group my-3 col-8 mx-auto">
            <label for="current_password">現在のパスワード</label>
            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current Password">
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="new_password">新しいパスワード</label>
            <input type="password" class="form-control" id="new_password" name="new_password" placeholder="New Password">
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="new_password_confirmed">新しいパスワード（確認用）</label>
            <input type="password" class="form-control" id="new_password_confirmed" name="new_password_confirmation" placeholder="New Confirmed Password">
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <button type="submit" class="btn btn-secondary">更新</button>
        </div>
        @method('put')
        @csrf
    </form>
@endsection