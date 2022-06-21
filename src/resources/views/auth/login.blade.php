@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="d-flex justify-content-around mt-5">
                <a href="{{route('teacher.login')}}" class="btn btn-secondary" role="button">教師の方はこちら</a>
                <a href="{{route('student.login')}}" class="btn btn-secondary" role="button">生徒の方はこちら</a>
            </div>
        </div>
    </div>
</div>
@endsection
