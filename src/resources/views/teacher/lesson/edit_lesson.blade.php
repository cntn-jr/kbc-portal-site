@extends('layouts.teacher_class')

@section('class_content')
    <h5 class="text-center my-3">授業編集</h5>
    <form action="{{ route('lesson.update', [
        'class_id' => $class->id,
        'lesson_id' => $lesson->id
        ]) }}" method="post">
        <div class="form-group my-3 col-8 mx-auto">
            <label for="class_name">授業名</label>
            <input type="text" class="form-control" id="class_name" name="name" value="{{ $lesson->name }}">
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="teacher">担任教師</label>
            <select id="teacher" class="form-control" name="teacher_id">
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" @if($teacher->id == $lesson->teacher_id) selected @endif >{{ $teacher->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <label for="outline">概要</label>
            <textarea type="text" class="form-control" id="outline" name="outline" rows="5">{{$lesson->outline}}</textarea>
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <button type="submit" class="btn btn-secondary">更新</button>
        </div>
        @method('put')
        @csrf
    </form>
@endsection