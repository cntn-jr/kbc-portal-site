@extends('layouts.teacher_class')

@section('class_content')

    <h5 class="text-center my-3">生徒アカウントの作成</h5>
    <form method="POST" action="{{ route('student.store_account', $class->id) }}" enctype="multipart/form-data" class="text-center">
        <div class="form-group col-8 my-4 mx-auto">
            <label class="" for="student_csv">CSVファイルを挿入してください</label>
        </div>
        <div class="form-group col-8 my-4 mx-auto">
            <input type="file" name="student_csv" id="student_csv" class="form-control-file">
        </div>
        <div class="form-group col-7 my-4 mx-auto">
            <button type="submit" class="btn btn-secondary">アカウント作成</button>
        </div>
        @csrf
    </form>

@endsection