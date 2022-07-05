@extends('layouts.teacher_class')

@section('class_content')
    <h5 class="text-center my-3">お知らせ作成</h5>
    <form action="{{ route('announcement.store', $class->id) }}" method="POST">
        <div class="form-group my-3 col-8 mx-auto">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" value="" required>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="content">内容</label>
            <textarea type="text" class="form-control" id="content" name="content" rows="5" required></textarea>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <button type="submit" class="btn btn-secondary">作成</button>
        </div>
        @csrf
    </form>
@endsection