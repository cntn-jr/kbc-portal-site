@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
                <h3 class="text-center mb-5">{{ $class->name }}</h3>
                <form action="{{ route('lesson.store', $class->id) }}" method="post">
                    <div class="form-group my-3 col-8 mx-auto">
                        <label for="class_name">授業名</label>
                        <input type="text" class="form-control" id="class_name" name="name">
                    </div>
                    <div class="form-group my-3 col-8 mx-auto">
                        <label for="teacher">担任教師</label>
                        <select id="teacher" class="form-control" name="teacher_id">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group my-3 col-8 mx-auto">
                        <label for="outline">概要</label>
                        <textarea type="text" class="form-control" id="outline" name="outline" rows="5"></textarea>
                    </div>
                    <div class="form-group my-3 col-8 mx-auto">
                        <button type="submit" class="btn btn-secondary">作成</button>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
@endsection