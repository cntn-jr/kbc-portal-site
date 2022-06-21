@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('teacher.store') }}" class="container" method="POST">
                <h3 class="mb-4 text-center">教師アカウント作成</h3>
                <div class="form-group my-3 col-8 mx-auto">
                    <label for="name">名前</label>
                    <input type="text" class="form-control" id="name" placeholder="河原 太郎" name="name" value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3 col-8 mx-auto">
                    <label for="email">メールアドレス</label>
                    <input type="email" class="form-control" id="email" placeholder="example@kawahara.ac.jp" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3 col-8 mx-auto">
                    <label for="password">パスワード</label>
                    <input type="text" class="form-control" id="password" value="{{ $password }}" disabled>
                    <input type="hidden" value="{{ $password }}" name="password">
                    <small id="passwordHelp1" class="form-text text-muted">パスワードは自動生成します。</small>
                    <small id="passwordHelp2" class="form-text text-muted">必ず忘れないようにして下さい。</small>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group my-3 col-8 mx-auto">
                    <input type="checkbox" class="form-check-input" id="isCreateStudent" name="isCreateStudent" value="1">
                    <label for="isCreateStudent">生徒作成する権限を与える</label>
                </div>
                <div class="form-group my-3 col-8 mx-auto">
                    <button type="submit" class="btn btn-secondary">登録</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
