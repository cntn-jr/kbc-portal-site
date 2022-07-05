@extends('layouts.teacher_class')

@section('class_content')
    <h5 class="text-center my-3">お知らせ編集</h5>
    <form action="{{ route('announcement.update', ['class_id' => $class->id, 'announcement_id' => $announcement->id]) }}" method="POST">
        <div class="form-group my-3 col-8 mx-auto">
            <label for="title">タイトル</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $announcement->title }}" required>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="content">内容</label>
            <textarea type="text" class="form-control" id="content" name="content" rows="5" required>{{$announcement->content}}</textarea>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <button type="submit" class="btn btn-secondary">更新</button>
        </div>
        @method('put')
        @csrf
    </form>
@endsection