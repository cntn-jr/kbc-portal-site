@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 bg-white my-3 py-3">
            <div class="container justify-content-center col-md-6">
                <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
                <h3 class="text-center mb-5">{{ $class->name }}</h3>
                <form method="POST" action="{{ route('student.store_account', $class->id) }}" enctype="multipart/form-data">
                    <div class="form-group my-3">
                        <label class="" for="student_csv">CSVファイルを挿入してください</label>
                        <input type="file" name="student_csv" id="student_csv" class="form-control-file">
                    </div>
                    <div class="form-group my-3">
                        <button type="submit" class="btn btn-secondary">アカウント作成</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection