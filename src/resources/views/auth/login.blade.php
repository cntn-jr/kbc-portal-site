@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                <p><a href="{{route('teacher.login')}}">教師の方はこちら</a></p>
                <p><a href="{{route('student.login')}}">生徒の方はこちら</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
